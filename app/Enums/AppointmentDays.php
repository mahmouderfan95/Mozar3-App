<?php

namespace App\Enums;

enum AppointmentDays
{

    public const SATURDAY = 1;
    public const SUNDAY = 2;
    public const MONDAY = 3;
    public const TUESDAY = 4;
    public const WEDNESDAY = 5;
    public const THURSDAY = 6;
    public const FRIDAY = 7;

    public static function getDaysList(): array
    {
        return [
            self::SATURDAY => trans('admin.service_appointments.days.saturday'),
            self::SUNDAY => trans('admin.service_appointments.days.sunday'),
            self::MONDAY => trans('admin.service_appointments.days.monday'),
            self::TUESDAY => trans('admin.service_appointments.days.tuesday'),
            self::WEDNESDAY => trans('admin.service_appointments.days.wednesday'),
            self::THURSDAY => trans('admin.service_appointments.days.thursday'),
            self::FRIDAY => trans('admin.service_appointments.days.friday'),
        ];
    }

    public static function getStatus(int $status_id): string
    {
        return self::getDaysList()[$status_id] ?? 'Unknown';
    }

    public static function getAppointmentDays(): array
    {
        return [
            self::SATURDAY,
            self::SUNDAY,
            self::MONDAY,
            self::TUESDAY,
            self::WEDNESDAY,
            self::THURSDAY,
            self::FRIDAY,
        ];
    }
}
