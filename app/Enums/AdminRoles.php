<?php

namespace App\Enums;

enum AdminRoles : string{
    case Admin = "Admin";
    case Doctor = "Doctor";
    case Reception = "Reception";
    case Nurse = "Nurse";
    case Staff = "Staff";
}
