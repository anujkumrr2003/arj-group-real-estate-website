<?php
include "config.php";

header("Content-Type: application/xml; charset=UTF-8");

$base = "https://arjgroup.in/";

echo '<?xml version="1.0" encoding="UTF-8"?>';
?>

<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">

<?php

// SEO Slug Generator
function makeSlug($text)
{
    $text = trim($text);
    $text = strtolower($text);

    // Remove unwanted characters
    $text = preg_replace('/[^a-z0-9]+/i', '-', $text);

    // Remove duplicate hyphens
    $text = preg_replace('/-+/', '-', $text);

    // Remove starting & ending hyphen
    $text = trim($text, '-');

    return $text;
}

// XML Safe URL
function addUrl($url, $priority = "0.80", $changefreq = "weekly")
{
    $url = htmlspecialchars($url, ENT_XML1 | ENT_QUOTES, 'UTF-8');

    echo "<url>\n";
    echo "    <loc>{$url}</loc>\n";
    echo "    <lastmod>" . date('Y-m-d') . "</lastmod>\n";
    echo "    <changefreq>{$changefreq}</changefreq>\n";
    echo "    <priority>{$priority}</priority>\n";
    echo "</url>\n";
}


/* =======================
   Static Pages
======================= */

addUrl($base . "/", "1.0", "daily");
addUrl($base . "/about.php");
addUrl($base . "/contact.php");
addUrl($base . "/projects.php");
addUrl($base . "/developers.php");
addUrl($base . "/blog.php");


/* =======================
   Property Pages
======================= */

$sql = mysqli_query($conn, "SELECT video FROM ck");

while ($row = mysqli_fetch_assoc($sql)) {

    $slug = makeSlug($row['video']);

    addUrl($base . "/views.php/" . $slug, "0.90");
}


/* =======================
   Developers
======================= */

$sql = mysqli_query($conn, "SELECT name FROM developers");

while ($row = mysqli_fetch_assoc($sql)) {

    $slug = urlencode(trim($row['name']));

    addUrl($base . "/developers.php?developer=" . $slug);
}


/* =======================
   Blogs
======================= */

$sql = mysqli_query($conn, "SELECT title FROM blogs");

while ($row = mysqli_fetch_assoc($sql)) {

    $slug = makeSlug($row['title']);

    addUrl($base . "/blog-details.php?slug=" . $slug);
}


/* =======================
   Commercial
======================= */

$sql = mysqli_query($conn, "SELECT name FROM comercial");

while ($row = mysqli_fetch_assoc($sql)) {

    $slug = makeSlug($row['name']);

    addUrl($base . "/comercial.php?name=" . $slug);
}

?>

</urlset>