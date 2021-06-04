<?php

$days = scandir(__DIR__ . '/storage');
$days = array_filter($days, static fn ($item) => (bool)preg_match('/\d{4}-\d{2}-\d{2}/', $item));

rsort($days);

$result = [];
foreach ($days as $day) {
    $dir = __DIR__ . '/storage/' . $day;
    $files = scandir($dir);
    $files = array_filter($files, static fn ($item) => (bool)preg_match('/\d+_[a-f0-9]{32}\.log/', $item));

    $result[$day] = [];

    foreach ($files as $file) {
        $comment = file_get_contents("{$dir}/{$file}");
        $comment = unserialize($comment);
        $comment['time'] = substr($file, 0, strpos($file, '_'));

//        preg_match('/\d+_/', $file, $time);
//        $time = str_replace('_', '', $time);

        $result[$day][$file] = $comment;
    }

    uasort(
        $result[$day],
        static fn (array $a, array $b) => $b['time'] <=> $a['time']
//        static function(array $a, array $b) {
//            return $b['time'] <=> $a['time'];
//        }
    );
}

return $result;
