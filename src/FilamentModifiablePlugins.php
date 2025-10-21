<?php

namespace TimoDeWinter\FilamentModifiablePlugins;

use Filament\Support\Concerns\EvaluatesClosures;
use TimoDeWinter\FilamentModifiablePlugins\Concerns\ResourceModifications\CanModifyCluster;
use TimoDeWinter\FilamentModifiablePlugins\Concerns\ResourceModifications\CanModifyNavigation;
use TimoDeWinter\FilamentModifiablePlugins\Concerns\ResourceModifications\CanModifyPageFeatures;
use TimoDeWinter\FilamentModifiablePlugins\Concerns\ResourceModifications\CanModifyTable;

class FilamentModifiablePlugins
{
    use CanModifyCluster;
    use CanModifyNavigation;
    use CanModifyPageFeatures;
    use CanModifyTable;
    use EvaluatesClosures;
}
