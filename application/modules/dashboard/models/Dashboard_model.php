<?php

class Dashboard_model extends CI_Model {

public function TodayPatientRegistration() {

    $startOfDay = strtotime("today");      // রাত ১২টা ১২:০০ AM
    $endOfDay = strtotime("tomorrow") - 1; // রাত ১১:৫৯:৫৯ PM

    $this->db->select('COUNT(id) as total');
    $this->db->where('registration_date >=', $startOfDay);
    $this->db->where('registration_date <=', $endOfDay);
    $query = $this->db->get('patients');

    if ($query->num_rows() > 0) {
        return $query->row()->total;
    } else {
        return 0;
    }
}
public function TodayBilling() {

    $startOfDay = strtotime("today");      // রাত ১২টা ১২:০০ AM
    $endOfDay = strtotime("tomorrow") - 1; // রাত ১১:৫৯:৫৯ PM

    $this->db->select('COUNT(id) as total');
    $this->db->where('invoice_date >=', $startOfDay);
    $this->db->where('invoice_date <=', $endOfDay);
    $query = $this->db->get('bill_info');

    if ($query->num_rows() > 0) {
        return $query->row()->total;
    } else {
        return 0;
    }
}

public function TodayCollection() {
    $startOfDay = strtotime("today");
    $endOfDay = strtotime("tomorrow") - 1;

    $this->db->select_sum('amount');
    $this->db->where('transaction_type', 'credit');
    $this->db->where('status', 'success');
    $this->db->where('transaction_date >=', $startOfDay);
    $this->db->where('transaction_date <=', $endOfDay);
    $query = $this->db->get('transactions');

    if ($query->num_rows() > 0) {
        return $query->row()->amount ?? 0;
    } else {
        return 0;
    }
}

public function TodayDue() {
    $startOfDay = strtotime("today");
    $endOfDay = strtotime("tomorrow") - 1;

    // Step 1: Get total debit amount for today with invoice_id > 0
    $this->db->select_sum('amount');
    $this->db->where('transaction_type', 'debit');
    $this->db->where('status', 'success');
    $this->db->where('invoice_id >', 0);
    $this->db->where('transaction_date >=', $startOfDay);
    $this->db->where('transaction_date <=', $endOfDay);
    $debitQuery = $this->db->get('transactions');
    $totalDebit = $debitQuery->row()->amount ?? 0;

    // Step 2: Get total credit amount for today with invoice_id > 0
    $this->db->select_sum('amount');
    $this->db->where('transaction_type', 'credit');
    $this->db->where('status', 'success');
    $this->db->where('invoice_id >', 0);
    $this->db->where('transaction_date >=', $startOfDay);
    $this->db->where('transaction_date <=', $endOfDay);
    $creditQuery = $this->db->get('transactions');
    $totalCredit = $creditQuery->row()->amount ?? 0;

    // Step 3: Calculate due
    $due = $totalDebit - $totalCredit;
    if ($due < 0) $due = 0; // Due can't be negative

    return $due;
}

public function ThisMonthPatientRegistration() {
    $startOfMonth = strtotime(date('Y-m-01 00:00:00'));
    $endOfMonth = strtotime(date('Y-m-t 23:59:59'));

    $this->db->select('COUNT(id) as total');
    $this->db->where('registration_date >=', $startOfMonth);
    $this->db->where('registration_date <=', $endOfMonth);

    $query = $this->db->get('patients');

    if ($query->num_rows() > 0) {
        return $query->row()->total;
    } else {
        return 0;
    }
}

public function ThisMonthBilling() {
    $startOfMonth = strtotime(date('Y-m-01 00:00:00'));
    $endOfMonth = strtotime(date('Y-m-t 23:59:59'));

    $this->db->select_sum('amount');
    $this->db->where('transaction_type', 'debit');
    $this->db->where('status', 'success');
    $this->db->where('transaction_date >=', $startOfMonth);
    $this->db->where('transaction_date <=', $endOfMonth);

    $query = $this->db->get('transactions');
    $totalBilling = $query->row()->amount ?? 0;

    return $totalBilling;
}


public function ThisMonthCollection() {
    $startOfMonth = strtotime(date('Y-m-01 00:00:00'));
    $endOfMonth = strtotime(date('Y-m-t 23:59:59'));

    $this->db->select_sum('amount');
    $this->db->where('transaction_type', 'credit');
    $this->db->where('status', 'success');
    $this->db->where('transaction_date >=', $startOfMonth);
    $this->db->where('transaction_date <=', $endOfMonth);

    $query = $this->db->get('transactions');
    $totalCollection = $query->row()->amount ?? 0;

    return $totalCollection;
}


public function ThisMonthDue() {
  
    $startOfMonth = strtotime(date('Y-m-01 00:00:00'));
  
    $endOfMonth = strtotime(date('Y-m-t 23:59:59'));

    // Step 1: মোট debit (invoice_id > 0) এই মাসে
    $this->db->select_sum('amount');
    $this->db->where('transaction_type', 'debit');
    $this->db->where('status', 'success');
    $this->db->where('invoice_id >', 0);
    $this->db->where('transaction_date >=', $startOfMonth);
    $this->db->where('transaction_date <=', $endOfMonth);
    $debitQuery = $this->db->get('transactions');
    $totalDebit = $debitQuery->row()->amount ?? 0;

    // Step 2: মোট credit (invoice_id > 0) এই মাসে
    $this->db->select_sum('amount');
    $this->db->where('transaction_type', 'credit');
    $this->db->where('status', 'success');
    $this->db->where('invoice_id >', 0);
    $this->db->where('transaction_date >=', $startOfMonth);
    $this->db->where('transaction_date <=', $endOfMonth);
    $creditQuery = $this->db->get('transactions');
    $totalCredit = $creditQuery->row()->amount ?? 0;

    // Step 3: due হিসাব
    $due = $totalDebit - $totalCredit;
    if ($due < 0) $due = 0;

    return $due;
}



}