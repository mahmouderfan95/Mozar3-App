<?php

namespace App\Enums;

enum AppointmentTimes: int
{
    case ONE_AM = 1;
    case TWO_AM = 2;
    case THREE_AM = 3;
    case FOUR_AM = 4;
    case FIVE_AM = 5;
    case SIX_AM = 6;
    case SEVEN_AM = 7;
    case EIGHT_AM = 8;
    case NINE_AM = 9;
    case TEN_AM = 10;
    case ELEVEN_AM = 11;
    case TWELVE_PM = 12;
    case ONE_PM = 13;
    case TWO_PM = 14;
    case THREE_PM = 15;
    case FOUR_PM = 16;
    case FIVE_PM = 17;
    case SIX_PM = 18;
    case SEVEN_PM = 19;
    case EIGHT_PM = 20;
    case NINE_PM = 21;
    case TEN_PM = 22;
    case ELEVEN_PM = 23;
    case TWELVE_AM = 24;

    public static function getTimeList(): array
    {
        return [
            self::ONE_AM->value => '1:00 ص',
            self::TWO_AM->value => '2:00 ص',
            self::THREE_AM->value => '3:00 ص',
            self::FOUR_AM->value => '4:00 ص',
            self::FIVE_AM->value => '5:00 ص',
            self::SIX_AM->value => '6:00 ص',
            self::SEVEN_AM->value => '7:00 ص',
            self::EIGHT_AM->value => '8:00 ص',
            self::NINE_AM->value => '9:00 ص',
            self::TEN_AM->value => '10:00 ص',
            self::ELEVEN_AM->value => '11:00 ص',
            self::TWELVE_PM->value => '12:00 م',
            self::ONE_PM->value => '1:00 م',
            self::TWO_PM->value => '2:00 م',
            self::THREE_PM->value => '3:00 م',
            self::FOUR_PM->value => '4:00 م',
            self::FIVE_PM->value => '5:00 م',
            self::SIX_PM->value => '6:00 م',
            self::SEVEN_PM->value => '7:00 م',
            self::EIGHT_PM->value => '8:00 م',
            self::NINE_PM->value => '9:00 م',
            self::TEN_PM->value => '10:00 م',
            self::ELEVEN_PM->value => '11:00 م',
            self::TWELVE_AM->value => '12:00 ص',
        ];
    }

    public static function getStatus(int $time_id): string
    {
        return self::getTimeList()[$time_id] ?? 'Unknown';
    }
}
