<?php

namespace App\Enums;

enum CategoryTypeEnum: string{

    case PUBLIQUE = 'publique';
    case TOUS = 'tous';
    case AFFILIATIONS = 'affiliations';
    case EXTERNAL = 'external';
}