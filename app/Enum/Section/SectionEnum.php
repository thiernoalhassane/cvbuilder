<?php

namespace App\Enum\ResumeStatus;

enum SectionEnum: string
{
    case Information = "Information de base";
    case  Experience= "Experience";
    case  Diplome= "Diplome";
    case Atout = "Atout";
    case  CompetenceG= "Competence Generale";
    case  Interet= "Centre d'interet";
    case  CompetenceI= "Competence Informatique";
    case  Langue= "Langue";
    case  Libre= "Contenus libre";
    case  Reseaux= "Reseaux Sociaux";
    case  ExperienceA= "Experience Associative";
    case  Voyage= "Voyage";

}
