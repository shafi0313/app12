<?php

use RealRashid\SweetAlert\Facades\Alert;

if (! function_exists('bnDate')) {
    function bnDate($number)
    {
        $number = bdDate($number);
        $bengaliDigits = ['০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯', '/'];
        $bengaliNumber = '';

        foreach (str_split($number) as $digit) {
            $bengaliNumber .= $bengaliDigits[$digit] ?? $digit;
        }

        return $bengaliNumber;
    }
}

if (! function_exists('bnNumber')) {
    function bnNumber($number)
    {
        $bengaliDigits = ['০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯'];
        $bengaliNumber = '';

        foreach (str_split($number) as $digit) {
            $bengaliNumber .= $bengaliDigits[$digit] ?? $digit;
        }

        return $bengaliNumber;
    }
}




if (! function_exists('cVar')) {
    function cVar(string $varName, $data)
    {
        if (empty($data)) {
            return null;
        }

        $config = config('var.' . $varName);

        return $config[$data] ?? null;
    }
}

if (! function_exists('centerQuery')) {
    function centerQuery($query)
    {
        if (user()->role == 1) {
            $query;
        } elseif (user()->role == 2) {
            $query->where('center_id', user()->center_id);
        } else {
            $query->where('user_id', user()->id);
        }
        return $query;
    }
}

if (! function_exists('isSuperAdmin')) {
    function isSuperAdmin()
    {
        return user()->role == 1;
    }
}

if (! function_exists('isAdmin')) {
    function isAdmin()
    {
        return user()->role == 2;
    }
}

if (! function_exists('accessMsg')) {
    function accessMsg()
    {
        Alert::error('You do not have permission to access this page.');
        return back();
    }
}
