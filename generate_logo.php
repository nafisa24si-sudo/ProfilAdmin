<?php
// Generate Professional Desa Logo PNG

$width = 240;
$height = 240;

// Create image
$image = imagecreatetruecolor($width, $height);

// Define colors - BLUE THEME
$colorDarkBlue = imagecolorallocate($image, 25, 55, 109);        // Dark navy blue
$colorMediumBlue = imagecolorallocate($image, 65, 105, 225);     // Royal blue
$colorLightBlue = imagecolorallocate($image, 135, 206, 250);     // Light sky blue
$colorGold = imagecolorallocate($image, 255, 215, 0);            // Gold accent
$colorWhite = imagecolorallocate($image, 255, 255, 255);         // White
$colorOffWhite = imagecolorallocate($image, 240, 248, 255);      // Alice blue

// Background gradient-like effect (dark blue)
$bgColor = imagecolorallocate($image, 30, 60, 114);
imagefilledrectangle($image, 0, 0, $width, $height, $bgColor);

// Draw outer circle border (dark navy blue)
imagefilledellipse($image, 120, 120, 220, 220, $colorDarkBlue);

// Draw main circle (medium blue)
imagefilledellipse($image, 120, 120, 210, 210, $colorMediumBlue);

// Draw gold inner circle (like a seal)
imagefilledellipse($image, 120, 120, 190, 190, $colorGold);

// Draw blue center circle
imagefilledellipse($image, 120, 120, 160, 160, $colorMediumBlue);

// Draw house/building (simple pentagon-like shape for desa)
// Draw triangle roof (dark blue)
$roof_points = array(120, 50, 80, 90, 160, 90);
imagefilledpolygon($image, $roof_points, 3, $colorDarkBlue);

// Draw house rectangle (off-white)
imagefilledrectangle($image, 85, 90, 155, 130, $colorOffWhite);

// Draw door (dark blue)
imagefilledrectangle($image, 110, 110, 130, 130, $colorDarkBlue);

// Draw window 1 (light blue)
imagefilledrectangle($image, 88, 95, 100, 107, $colorLightBlue);

// Draw window 2 (light blue)
imagefilledrectangle($image, 140, 95, 152, 107, $colorLightBlue);

// Draw rice field lines (gold accent)
$lineY = 145;
imageline($image, 90, $lineY, 150, $lineY, $colorGold);
imageline($image, 90, $lineY + 8, 150, $lineY + 8, $colorGold);

// Add text "DESA" at bottom (using built-in font)
$textColor = imagecolorallocate($image, 255, 255, 255);
imagestring($image, 5, 95, 165, 'DESA', $textColor);

// Save image
$output_path = __DIR__ . '/public/images/logo_desa.png';
if (!is_dir(dirname($output_path))) {
    mkdir(dirname($output_path), 0777, true);
}

imagepng($image, $output_path);
imagedestroy($image);

echo "Logo generated: $output_path\n";
echo "File size: " . filesize($output_path) . " bytes\n";
?>
