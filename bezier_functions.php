<?php

// Calculate the coordinate of the Bezier curve at $t = 0..1
function Bezier_eval($p1,$p2,$p3,$p4,$t) {
    // lines between successive pairs of points (degree 1)
    $q1  = array((1-$t) * $p1[0] + $t * $p2[0],(1-$t) * $p1[1] + $t * $p2[1]);
    $q2  = array((1-$t) * $p2[0] + $t * $p3[0],(1-$t) * $p2[1] + $t * $p3[1]);
    $q3  = array((1-$t) * $p3[0] + $t * $p4[0],(1-$t) * $p3[1] + $t * $p4[1]);
    // curves between successive pairs of lines. (degree 2)
    $r1  = array((1-$t) * $q1[0] + $t * $q2[0],(1-$t) * $q1[1] + $t * $q2[1]);
    $r2  = array((1-$t) * $q2[0] + $t * $q3[0],(1-$t) * $q2[1] + $t * $q3[1]);
    // final curve between the two 2-degree curves. (degree 3)
    return array((1-$t) * $r1[0] + $t * $r2[0],(1-$t) * $r1[1] + $t * $r2[1]);
}

// Calculate the squared distance between two points
function Point_distance2($p1,$p2) {
    $dx = $p2[0] - $p1[0];
    $dy = $p2[1] - $p1[1];
    return $dx * $dx + $dy * $dy;
}

// Convert the curve to a polyline
function Bezier_convert($p1,$p2,$p3,$p4,$tolerance) {
    $t1 = 0.0;
    $prev = $p1;
    $t2 = 0.1;
    $tol2 = $tolerance * $tolerance;
    $result []= $prev[0];
    $result []= $prev[1];
    while ($t1 < 1.0) {
        if ($t2 > 1.0) {
            $t2 = 1.0;
        }
        $next = Bezier_eval($p1,$p2,$p3,$p4,$t2);
        $dist = Point_distance2($prev,$next);
        while ($dist > $tol2) {
            // Halve the distance until small enough
            $t2 = $t1 + ($t2 - $t1) * 0.5;
            $next = Bezier_eval($p1,$p2,$p3,$p4,$t2);
            $dist = Point_distance2($prev,$next);
        }
        // the image*polygon functions expect a flattened array of coordiantes
        $result []= $next[0];
        $result []= $next[1];
        $t1 = $t2;
        $prev = $next;
        $t2 = $t1 + 0.1;
    }
    return $result;
}

// Draw a Bezier curve on an image
function Bezier_drawfilled($image,$p1,$p2,$p3,$p4,$color) {
    $polygon = Bezier_convert($p1,$p2,$p3,$p4,1.0);
    $polygon[] = -2;
    $polygon[] = 201;
    imagepolygon($image,$polygon,count($polygon)/2,$color);
}

?>
