<?php
if (!function_exists('getNamaDivisi')) {
    function getNamaDivisi($id_divisi)
    {
        switch ($id_divisi) {
            case 1:
                return 'Direktorat Utama';
            case 2:
                return 'Divisi Internal Audit Group - Bagian Audit Plan & Control';
            case 3:
                return 'Divisi Corporate Secretary - Bagian Corporate Office Services';
            case 4:
                return 'Divisi Corporate Secretary - Bagian Corporate Communication';
            case 5:
                return 'Divisi Corporate Secretary - Bagian CSR & Community Development';
            case 6:
                return 'Divisi Sales & Marketing - Bagian Sales & Marketing Plan & Control';
            case 7:
                return 'Divisi Sales & Marketing - Bagian Sales & Marketing Operation';
            case 8:
                return 'Divisi Commercial Engineering - Bagian Sales Engineering';
            case 9:
                return 'Divisi Commercial Engineering - Bagian IT & Product Dev';
            case 10:
                return 'Divisi Commercial Engineering - Bagian Business Dev';
            case 11:
                return 'Divisi Commercial Engineering - Bagian Partnership';
            case 12:
                return 'Direktorat KUG, SDM, HUKUM, & MR';
            case 13:
                return 'Divisi Financial Planning & Analysis - Bagian Treasury & Taxation';
            case 14:
                return 'Divisi Financial Planning & Analysis - Bagian Billing & Collection Management';
            case 15:
                return 'Divisi Financial Planning & Analysis - Bagian Financial Plan, Control, & Report';
            case 16:
                return 'Divisi Financial Planning & Analysis - Bagian Financial Accounting';
            case 17:
                return 'Divisi Human Capital & General Affair - Bagian Human Capital';
            case 18:
                return 'Divisi Human Capital & General Affair - Bagian General Affair';
            case 19:
                return 'Divisi Legal & Risk Management - Bagian Risk Management';
            case 20:
                return 'Divisi Legal & Risk Management - Bagian Legal';
            case 21:
                return 'Direktorat Operasi';
            case 22:
                return 'Divisi Operation - Bagian Operation Planning & Control';
            case 23:
                return 'Divisi Operation - Bagian Production';
            case 24:
                return 'Divisi Operation - Bagian Project';
            case 25:
                return 'Divisi Operation - Bagian Quality Management & HSE';
            default:
                return 'Unknown';
        }
    }
}
