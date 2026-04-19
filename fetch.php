<?php
include 'db_connect.php';
$result = $conn->query("SELECT * FROM campaigns ORDER BY id DESC");

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<div class='card'>";
        echo "<span style='background: #fce4ec; color: #d81b60; padding: 5px 12px; border-radius: 20px; font-size: 11px; font-weight: bold;'>" . strtoupper($row['category']) . "</span>";
        echo "<h3 style='margin: 15px 0 10px 0; color: #333;'>" . htmlspecialchars($row['title']) . "</h3>";
        echo "<p style='color: #666; line-height: 1.6; font-size: 14px;'>" . htmlspecialchars($row['description']) . "</p>";
        echo "<div style='display: flex; justify-content: space-between; align-items: center; margin-top: 20px;'>";
        echo "<small style='color: #bbb;'>Date: " . date('d M Y', strtotime($row['created_at'])) . "</small>";
        echo "<button style='width: auto; padding: 8px 20px; font-size: 12px;'>View Details</button>";
        echo "</div>";
        echo "</div>";
    }
} else {
    echo "<p style='text-align: center; color: #999; margin-top: 20px;'>No campaigns yet. Be the first leader!</p>";
}
?>