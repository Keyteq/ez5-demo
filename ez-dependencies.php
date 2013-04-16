<?php
echo "Checking folder for required dependencies.\n";

$vendor = getcwd() . "/vendor";
$legacy = getcwd() . "/ezpublish_legacy";

if (is_dir($vendor) && is_dir($legacy))
{
    echo "All dependencies in place. Nothing to do.";
    exit(0);
}

$pathToEz = isset($argv[1]) ? $argv[1] : null;

if (!is_dir($pathToEz) && !is_link($pathToEz))
{
    echo "Supply to ezpublish sources: ";
    $handle = fopen ("php://stdin","r");
    $pathToEz = trim(preg_replace("/[\r\n]/","",fgets($handle)));
    if(!is_dir($pathToEz) && !is_link($pathToEz)){
        echo "Path: $pathToEz does not exist.";
        exit(1);
    }
}

$pathToEzVendor = $pathToEz . "/vendor";
$pathToEzLegacy = $pathToEz . "/ezpublish_legacy";

if (file_exists($pathToEzVendor) && file_exists($pathToEzLegacy))
{
    echo "Copy: $pathToEzVendor -> $vendor\n";
    //copy($pathToEzVendor, $vendor);
    exec("cp -r $pathToEzVendor $vendor");
    echo "Copy: $pathToEzLegacy -> $legacy\n";
    //copy($pathToEzLegacy, $legacy);
    exec("cp -r $pathToEzLegacy $legacy");
    exit(0);
}
else {
    echo "Could not find sources for vendor and ezpublish_legacy.";
    exit(1);
}

echo "\n";
echo "Thank you, continuing...\n";