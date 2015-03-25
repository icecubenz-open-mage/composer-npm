<?php
namespace Kwf\ComposerExtraAssets;

use Version\Constraint;

class VersionMatcher
{
    /**
     * Return the higher version of $version1 and $version2 if both match. Else return false.
     *
     * @param string $version1
     * @param string $version2
     * @return string|bool
     */
    public static function matchVersions($version1, $version2)
    {
        if ($version1 == '*') {
            return $version2;
        }
        if ($version2 == '*') {
            return $version1;
        }

        $v1 = Constraint::parse($version1);
        $v2 = Constraint::parse($version2);

        if ($v1->isSubsetOf($v2)) {
            return $version1;
        } else if ($v2->isSubsetOf($v1)) {
            return $version2;
        } else {
            return false;
        }
    }
}