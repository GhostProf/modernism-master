<?php foreach(glob("*html") as $f) {if (strpos($f,".")==1) {echo "$f\n";rename($f,"0$f");}}
