<?php

declare(strict_types=1);

namespace AoC\DayThree;

class Task
{
    public function partOne(): int
    {
        $file = file(__DIR__ . '/input.txt');

        $total = 0;

        foreach (self::formatCards($file) as $card) {
            $winningPoints = 0;
            foreach ($card['winningNumbers'] as $cardWinningNumber) {
                if (in_array($cardWinningNumber, $card['cardNumbers'], true)) {
                    $winningPoints = ($winningPoints === 0) ? 1 : $winningPoints * 2;
                }
            }

            $total += $winningPoints;
        }

        return $total;
    }

    private static function formatCards(array $file): array
    {
        $formatted = [];

        foreach ($file as $card) {
            $id = (int)\str_replace('Card ', '', \substr($card, 0, \strpos($card, ':')));

            $card = str_replace([
                'Card   ' . $id . ':',
                'Card  ' . $id . ':',
                'Card ' . $id . ':'
            ], '', $card);

            $cardArray = explode('|', $card);

            $cardNumbers = array_filter(explode(' ', str_replace('  ', ' ', $cardArray[0])));
            $winningNumbers = array_filter(explode(' ', str_replace('  ', ' ', $cardArray[1])));

            $formatted[] = [
                'id' => $id,
                'cardNumbers' => array_map('intval', $cardNumbers),
                'winningNumbers' => array_map('intval', $winningNumbers)
            ];
        }

        return $formatted;
    }
}
