<?php
/* fetch.php — renders campaign cards
   Included by index.php; $conn is already available via db_connect.php */

$filter   = $_GET['filter'] ?? 'all';
$page     = max(1, (int)($_GET['page'] ?? 1));
$per_page = 10;
$offset   = ($page - 1) * $per_page;

$allowed = ['Business', 'Health', 'Education', 'Advocacy'];

/* Build query (filter handled client-side via JS; all records fetched here) */
$stmt = $conn->prepare(
    "SELECT id, title, category, description, created_at
     FROM campaigns
     ORDER BY id DESC
     LIMIT ? OFFSET ?"
);
$stmt->bind_param("ii", $per_page, $offset);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    echo '<div class="no-campaigns">';
    echo '<p>✦</p>';
    echo '<p>No campaigns yet — be the first to launch one!</p>';
    echo '</div>';
    $stmt->close();
    return;
}

while ($row = $result->fetch_assoc()) {
    $cat        = htmlspecialchars($row['category'], ENT_QUOTES, 'UTF-8');
    $title      = htmlspecialchars($row['title'],    ENT_QUOTES, 'UTF-8');
    $desc       = htmlspecialchars($row['description'], ENT_QUOTES, 'UTF-8');
    $date       = date('d M Y', strtotime($row['created_at']));
    $badge_class = 'badge-' . $cat;
    ?>
    <div class="card" data-category="<?= $cat ?>" data-id="<?= (int)$row['id'] ?>">
        <div class="card-top">
            <span class="badge <?= $badge_class ?>"><?= strtoupper($cat) ?></span>
            <span class="card-date"><?= $date ?></span>
        </div>
        <h3><?= $title ?></h3>
        <p><?= mb_strimwidth($desc, 0, 180, '…') ?></p>
        <div class="card-footer">
            <span style="font-size:12px; color:var(--muted);">Launched <?= $date ?></span>
            <button class="view-btn"
                    onclick="location.href='campaign.php?id=<?= (int)$row['id'] ?>'">
                View details →
            </button>
        </div>
    </div>
    <?php
}

$stmt->close();