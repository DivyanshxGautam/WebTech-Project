<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EmpowerHer | Campaign Details</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,700;1,400&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet">
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
        :root {
            --rose: #c2185b; --rose-dark: #880e4f; --rose-light: #fce4ec;
            --plum: #6a1b9a; --ink: #1a0a0f; --muted: #7a5a66;
            --surface: #fff8f9; --white: #ffffff; --card-border: #f3c4d4;
        }
        body { background: var(--surface); font-family: 'DM Sans', sans-serif; color: var(--ink); min-height: 100vh; }

        .header {
            background: var(--white); border-bottom: 1px solid var(--card-border);
            padding: 0 40px; display: flex; align-items: center;
            justify-content: space-between; height: 64px; position: sticky; top: 0; z-index: 50;
        }
        .logo { font-family: 'Playfair Display', serif; font-size: 22px; color: var(--rose); letter-spacing: -0.5px; text-decoration: none; }
        .logo span { font-style: italic; color: var(--plum); }
        .nav-links { display: flex; gap: 24px; font-size: 13px; }
        .nav-links a { text-decoration: none; color: var(--muted); transition: color 0.2s; }
        .nav-links a:hover { color: var(--rose); }

        .back-bar {
            max-width: 860px; margin: 32px auto 0; padding: 0 24px;
        }
        .back-btn {
            display: inline-flex; align-items: center; gap: 8px;
            font-size: 13px; color: var(--muted); text-decoration: none;
            transition: color 0.2s;
        }
        .back-btn:hover { color: var(--rose); }
        .back-btn::before { content: '←'; font-size: 16px; }

        .container {
            max-width: 860px; margin: 24px auto 60px;
            padding: 0 24px;
            display: grid;
            grid-template-columns: 1fr 300px;
            gap: 28px;
            align-items: start;
        }

        /* ── Main card ── */
        .main-card {
            background: var(--white);
            border: 1px solid var(--card-border);
            border-radius: 20px;
            overflow: hidden;
        }
        .card-hero {
            background: linear-gradient(135deg, var(--rose-light) 0%, #f3e5f5 100%);
            padding: 40px 40px 32px;
            border-bottom: 1px solid var(--card-border);
        }
        .badge {
            display: inline-block; font-size: 10px; font-weight: 500;
            padding: 4px 12px; border-radius: 20px; text-transform: uppercase;
            letter-spacing: 0.8px; margin-bottom: 16px;
        }
        .badge-Business  { background: #e8f5e9; color: #2e7d32; }
        .badge-Health    { background: #fff3e0; color: #e65100; }
        .badge-Education { background: #e3f2fd; color: #0d47a1; }
        .badge-Advocacy  { background: #f3e5f5; color: #6a1b9a; }

        .card-hero h1 {
            font-family: 'Playfair Display', serif;
            font-size: 32px; line-height: 1.2; color: var(--ink);
            margin-bottom: 12px;
        }
        .meta { font-size: 12px; color: var(--muted); display: flex; gap: 20px; flex-wrap: wrap; }
        .meta span { display: flex; align-items: center; gap: 5px; }

        .card-body { padding: 36px 40px; }
        .section-label {
            font-size: 11px; font-weight: 500; text-transform: uppercase;
            letter-spacing: 0.9px; color: var(--rose); margin-bottom: 12px;
            display: flex; align-items: center; gap: 8px;
        }
        .section-label::before { content: ''; display: block; width: 16px; height: 2px; background: var(--rose); }

        .description {
            font-size: 15px; line-height: 1.85; color: #3d2030;
            white-space: pre-wrap; margin-bottom: 32px;
        }

        /* Share */
        .share-row { display: flex; gap: 10px; flex-wrap: wrap; margin-top: 8px; }
        .share-btn {
            padding: 8px 18px; border-radius: 8px; font-size: 13px;
            font-family: 'DM Sans', sans-serif; font-weight: 500;
            cursor: pointer; border: 1px solid var(--card-border);
            background: var(--white); color: var(--ink);
            transition: all 0.2s; text-decoration: none; display: inline-block;
        }
        .share-btn:hover { border-color: var(--rose); color: var(--rose); }
        .share-btn.primary {
            background: linear-gradient(135deg, var(--rose), var(--plum));
            color: #fff; border-color: transparent;
        }
        .share-btn.primary:hover { opacity: 0.9; }

        /* ── Sidebar ── */
        .sidebar { display: flex; flex-direction: column; gap: 20px; }

        .side-card {
            background: var(--white); border: 1px solid var(--card-border);
            border-radius: 16px; padding: 24px;
        }
        .side-card h3 {
            font-family: 'Playfair Display', serif; font-size: 17px;
            margin-bottom: 16px; color: var(--ink);
        }
        .info-row {
            display: flex; justify-content: space-between; align-items: center;
            padding: 10px 0; border-bottom: 1px solid var(--card-border);
            font-size: 13px;
        }
        .info-row:last-child { border-bottom: none; }
        .info-label { color: var(--muted); }
        .info-val { font-weight: 500; color: var(--ink); }

        .support-btn {
            width: 100%; padding: 13px; margin-top: 16px;
            background: linear-gradient(135deg, var(--rose), var(--plum));
            color: #fff; border: none; border-radius: 10px;
            font-family: 'DM Sans', sans-serif; font-size: 14px; font-weight: 500;
            cursor: pointer; transition: opacity 0.2s, transform 0.2s; letter-spacing: 0.3px;
        }
        .support-btn:hover { opacity: 0.9; transform: translateY(-1px); }

        .not-found {
            text-align: center; padding: 80px 24px;
            font-family: 'Playfair Display', serif; font-size: 22px; color: var(--muted);
        }
        .not-found a { color: var(--rose); font-size: 14px; font-family: 'DM Sans', sans-serif; }

        @media (max-width: 720px) {
            .container { grid-template-columns: 1fr; }
            .card-hero { padding: 28px 24px 20px; }
            .card-body { padding: 24px; }
            .card-hero h1 { font-size: 24px; }
            .header { padding: 0 20px; }
        }
    </style>
</head>
<body>

<?php
include 'db_connect.php';

/* ── Validate ID ── */
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if ($id <= 0) {
    echo '<div class="not-found"><p>Campaign not found.</p><br><a href="index.php">← Back to campaigns</a></div>';
    exit;
}

/* ── Fetch campaign ── */
$stmt = $conn->prepare("SELECT * FROM campaigns WHERE id = ? LIMIT 1");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$campaign = $result->fetch_assoc();
$stmt->close();

if (!$campaign) {
    echo '<div class="not-found"><p>Campaign not found.</p><br><a href="index.php">← Back to campaigns</a></div>';
    exit;
}

$cat   = htmlspecialchars($campaign['category'], ENT_QUOTES, 'UTF-8');
$title = htmlspecialchars($campaign['title'],    ENT_QUOTES, 'UTF-8');
$desc  = htmlspecialchars($campaign['description'], ENT_QUOTES, 'UTF-8');
$date  = date('d F Y', strtotime($campaign['created_at']));
$time  = date('g:i A', strtotime($campaign['created_at']));
?>

<header class="header">
    <a href="index.php" class="logo">Empower<span>Her</span></a>
    <nav class="nav-links">
        <a href="index.php">Campaigns</a>
        <a href="about.php">About</a>
        <a href="stories.php">Stories</a>
        <a href="connect.php">Connect</a>
    </nav>
</header>

<div class="back-bar">
    <a href="index.php" class="back-btn">All Campaigns</a>
</div>

<div class="container">

    <!-- ── Main content ── -->
    <article class="main-card">
        <div class="card-hero">
            <span class="badge badge-<?= $cat ?>"><?= strtoupper($cat) ?></span>
            <h1><?= $title ?></h1>
            <div class="meta">
                <span>📅 <?= $date ?></span>
                <span>🕐 <?= $time ?></span>
                <span>📌 Campaign #<?= (int)$campaign['id'] ?></span>
            </div>
        </div>

        <div class="card-body">
            <p class="section-label">About this initiative</p>
            <p class="description"><?= $desc ?></p>

            <p class="section-label">Share &amp; Support</p>
            <div class="share-row">
                <button class="share-btn primary" onclick="navigator.clipboard.writeText(window.location.href).then(()=>this.textContent='Link copied!')">
                    Copy Link
                </button>
                <a class="share-btn"
                   href="https://wa.me/?text=Check+out+this+campaign+on+EmpowerHer:+<?= urlencode($title) ?>+<?= urlencode('http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']) ?>"
                   target="_blank" rel="noopener">WhatsApp</a>
                <a class="share-btn"
                   href="https://twitter.com/intent/tweet?text=<?= urlencode('Check out "'.$title.'" on EmpowerHer') ?>&url=<?= urlencode('http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']) ?>"
                   target="_blank" rel="noopener">Twitter / X</a>
            </div>
        </div>
    </article>

    <!-- ── Sidebar ── -->
    <aside class="sidebar">
        <div class="side-card">
            <h3>Campaign Info</h3>
            <div class="info-row"><span class="info-label">Category</span><span class="info-val"><?= $cat ?></span></div>
            <div class="info-row"><span class="info-label">Launched</span><span class="info-val"><?= $date ?></span></div>
            <div class="info-row"><span class="info-label">Status</span><span class="info-val" style="color:#2e7d32;">● Active</span></div>
            <div class="info-row"><span class="info-label">Campaign ID</span><span class="info-val">#<?= (int)$campaign['id'] ?></span></div>
            <button class="support-btn" onclick="this.textContent='✓ Supported!'; this.style.background='#388e3c'">
                Support this Initiative
            </button>
        </div>

        <div class="side-card">
            <h3>More Campaigns</h3>
            <?php
            /* ── Related campaigns (same category, different id) ── */
            $rel = $conn->prepare(
                "SELECT id, title FROM campaigns WHERE category = ? AND id != ? ORDER BY id DESC LIMIT 3"
            );
            $rel->bind_param("si", $campaign['category'], $id);
            $rel->execute();
            $related = $rel->get_result();
            $rel->close();

            if ($related->num_rows === 0) {
                echo '<p style="font-size:13px;color:var(--muted);">No related campaigns yet.</p>';
            } else {
                while ($r = $related->fetch_assoc()) {
                    $rt = htmlspecialchars($r['title'], ENT_QUOTES, 'UTF-8');
                    $rid = (int)$r['id'];
                    echo "<div class='info-row'><a href='campaign.php?id=$rid' style='font-size:13px;color:var(--rose);text-decoration:none;'>$rt →</a></div>";
                }
            }
            $conn->close();
            ?>
        </div>
    </aside>

</div>

</body>
</html>