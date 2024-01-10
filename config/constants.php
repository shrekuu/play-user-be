<?php

return [
  // 这里是为配合前端 ant design pro/umi.js 的 useRequest 的错误处理
  // 继续查看 ApiBaseController.php
  'error_show_types' => [
    'silent' => 0,
    'warning' => 1,
    'error' => 2,
    'notification' => 3,
    'redirect' => 9,
  ]
];
