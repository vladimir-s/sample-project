<?php
declare(strict_types = 1);

return [
    ['GET', '/', ['Sample\controllers\Homepage', 'show']],
    ['GET', '/{id:\d+}', ['Sample\controllers\Homepage', 'show']],
];