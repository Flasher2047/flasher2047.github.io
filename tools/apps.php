<?php
header('Content-Type: text/html; charset=utf-8');

// 1. 读取并解析更新配置
$jsonFile = __DIR__ . '/updates.json';
if (!file_exists($jsonFile)) die('配置文件 tools/updates.json 不存在！');
$data = json_decode(file_get_contents($jsonFile), true);
if (!$data || !isset($data['updates'])) die('配置文件解析失败！');

// 2. 整理 appId 映射与应用描述
$updates = array_column($data['updates'], null, 'appId');
$appDescriptions = [
    'com.qifang.tencent' => '查询您的QQ注册日期(暂时失效)',
    'com.qifang.notificationrecord' => '记录通知拦截撤回消息',
    'JiYvTrainer' => '开源应用搬运-极域免控工具，解除窗口全屏'
];

// 3. 渲染通知小记卡片
if (isset($updates['com.qifang.notificationrecord'])):
?>
<div class="app-card">
    <h2 class="card-title">通知小记</h2>
    <p class="card-desc"><?= htmlspecialchars($appDescriptions['com.qifang.notificationrecord']) ?></p>
    <div class="card-version">最新版本：<?= htmlspecialchars($updates['com.qifang.notificationrecord']['version']) ?></div>
    <div class="card-changelog"><?= htmlspecialchars($updates['com.qifang.notificationrecord']['changelog']) ?></div>
    <div class="card-btns">
        <a href="<?= htmlspecialchars($updates['com.qifang.notificationrecord']['downloadUrl']) ?>" class="card-btn btn-download">立即下载</a>
        <a href="https://www.123912.com/s/mGRwjv-fKwtd" target="_blank" class="card-btn btn-cloud">网盘下载</a>
    </div>
</div>
<?php endif; ?>

// 4. 渲染Q创查卡片
if (isset($updates['com.qifang.tencent'])):
?>
<div class="app-card">
    <h2 class="card-title">Q 创查</h2>
    <p class="card-desc"><?= htmlspecialchars($appDescriptions['com.qifang.tencent']) ?></p>
    <div class="card-version">最新版本：<?= htmlspecialchars($updates['com.qifang.tencent']['version']) ?></div>
    <div class="card-changelog"><?= htmlspecialchars($updates['com.qifang.tencent']['changelog']) ?></div>
    <div class="card-btns">
        <a href="<?= htmlspecialchars($updates['com.qifang.tencent']['downloadUrl']) ?>" class="card-btn btn-download">立即下载</a>
        <a href="https://www.123912.com/s/mGRwjv-fKwtd" target="_blank" class="card-btn btn-cloud">网盘下载</a>
    </div>
</div>
<?php endif; ?>

// 5. 渲染JiYvTrainer卡片
if (isset($updates['JiYvTrainer'])):
?>
<div class="app-card">
    <h2 class="card-title">JiYvTrainer</h2>
    <p class="card-desc"><?= htmlspecialchars($appDescriptions['JiYvTrainer']) ?></p>
    <div class="card-version">最新版本：<?= htmlspecialchars($updates['JiYvTrainer']['version']) ?></div>
    <div class="card-changelog"><?= htmlspecialchars($updates['JiYvTrainer']['changelog']) ?></div>
    <div class="card-btns">
        <a href="<?= htmlspecialchars($updates['JiYvTrainer']['downloadUrl']) ?>" class="card-btn btn-download">立即下载</a>
        <a href="https://github.com/imengyu/JiYuTrainer/releases" target="_blank" class="card-btn btn-cloud">开源下载</a>
    </div>
</div>
<?php endif; ?>
