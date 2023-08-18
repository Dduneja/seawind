<?php

function convertAmountToWords($amount) {
    $ones = array(
        1 => 'One',
        2 => 'Two',
        3 => 'Three',
        4 => 'Four',
        5 => 'Five',
        6 => 'Six',
        7 => 'Seven',
        8 => 'Eight',
        9 => 'Nine',
        10 =>'Ten',
        11 => 'Eleven',
        12 => 'Twelve',
        13 => 'Thirteen',
        14 => 'Fourteen',
        15 => 'Fifteen',
        16 => 'Sixteen',
        17 => 'Seventeen',
        18 => 'Eighteen',
        19 => 'Nineteen'
    );

    $tens = array(
        2 => 'Twenty',
        3 => 'Thirty',
        4 => 'Forty',
        5 => 'Fifty',
        6 => 'Sixty',
        7 => 'Seventy',
        8 => 'Eighty',
        9 => 'Ninety'
    );

    $amount = intval($amount);

    if ($amount < 20) {
        return $ones[$amount];
    }

    if ($amount < 100) {
        $word = $tens[floor($amount / 10)];

        if ($amount % 10 !== 0) {
            $word .= ' ' . $ones[$amount % 10];
        }

        return $word;
    }

    if ($amount < 1000) {
        $word = $ones[floor($amount / 100)] . ' Hundred ';

        if ($amount % 100 !== 0) {
            $word .= convertAmountToWords($amount % 100);
        }

        return $word;
    }

    if ($amount < 100000) {
        $word = convertAmountToWords(floor($amount / 1000)) . ' Thousand ';

        if ($amount % 1000 !== 0) {
            $word .= convertAmountToWords($amount % 1000);
        }

        return $word;
    }

    if ($amount < 10000000) {
        $word = convertAmountToWords(floor($amount / 100000)) . ' Lakh ';

        if ($amount % 100000 !== 0) {
            $word .= convertAmountToWords($amount % 100000);
        }

        return $word;
    }

    if ($amount < 1000000000) {
        $word = convertAmountToWords(floor($amount / 10000000)) . ' Crore ';

        if ($amount % 10000000 !== 0) {
            $word .= convertAmountToWords($amount % 10000000);
        }

        return $word;
    }

    return 'Amount out of range';
}
?>