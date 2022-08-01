<?php

namespace App\Models;

use Carbon\CarbonInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carbon extends \Carbon\Carbon
{
    public function diffForHumans($other = null, $syntax = null, $short = false, $parts = 1, $options = null)
    {
        \Jenssegers\Date\Date::setLocale('sr');
        /* @var CarbonInterface $this */
        if (\is_array($other)) {
            $other['syntax'] = \array_key_exists('syntax', $other) ? $other['syntax'] : $syntax;
            $syntax = $other;
            $other = $syntax['other'] ?? null;
        }

        $intSyntax = &$syntax;
        if (\is_array($syntax)) {
            $syntax['syntax'] = $syntax['syntax'] ?? null;
            $intSyntax = &$syntax['syntax'];
        }
        $intSyntax = (int) ($intSyntax ?? static::DIFF_RELATIVE_AUTO);
        $intSyntax = $intSyntax === static::DIFF_RELATIVE_AUTO && $other === null ? static::DIFF_RELATIVE_TO_NOW : $intSyntax;

        $parts = min(7, max(1, (int) $parts));

        return $this->diffAsCarbonInterval($other, false)
            ->setLocalTranslator($this->getLocalTranslator())
            ->forHumans($syntax, (bool) $short, $parts, $options ?? $this->localHumanDiffOptions ?? static::getHumanDiffOptions());
    }

}
