const fs = require("fs");
const path = require("path");
const archiver = require("archiver");

// Define the source files
const files = ["acf-rest-filter.php", "readme.txt", "LICENSE"];

// Read the version from `acf-rest-filter.php`
const pluginFile = fs.readFileSync("acf-rest-filter.php", "utf8");
const versionMatch = pluginFile.match(/Version:\s*([\d.]+)/);
const version = versionMatch ? versionMatch[1] : "unknown";

const releaseDir = path.join(__dirname, "releases");
const zipFilename = `acf-rest-filter-${version}.zip`;
const zipFilePath = path.join(releaseDir, zipFilename);

// Ensure `releases/` directory exists
if (!fs.existsSync(releaseDir)) {
    fs.mkdirSync(releaseDir);
}

// Create a zip archive
const output = fs.createWriteStream(zipFilePath);
const archive = archiver("zip", { zlib: { level: 9 } });

output.on("close", () => {
    console.log(`✅ Release package created: ${zipFilePath} (${archive.pointer()} bytes)`);
});

archive.on("error", (err) => {
    throw err;
});

// Pipe archive data to the file
archive.pipe(output);

// Add files to the archive
files.forEach((file) => {
    if (fs.existsSync(file)) {
        archive.file(file, { name: file });
    } else {
        console.warn(`⚠️ Warning: ${file} not found, skipping.`);
    }
});

// Finalize archive
archive.finalize();
