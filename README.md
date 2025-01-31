# Video Upload Application

## Project Overview

This is a simple video upload application built with PHP. It allows users to upload videos with a title and description, and the videos are stored in a designated folder while their metadata is saved in a database.

## Features

- Video upload functionality
- Database storage for video metadata (title, description, filename, and timestamp)
- Edit and delete functionality for uploaded videos
- Organized file structure

## File Structure

```
VIDEO UPLOAD/
|
|-- videos/                # Directory for storing uploaded video files
|
|-- about.php              # About page of the application
|-- AddVideo.php           # Page for uploading videos
|-- contact.php            # Contact page of the application
|-- db.php                 # Database connection and initialization script
|-- delete.php             # Script for deleting videos
|-- edit.php               # Page for editing video details
|-- index.php              # Home page displaying uploaded videos
|-- layout.php             # Common layout template for the application
```

## Prerequisites

- A web server (e.g., Apache or Nginx)
- PHP version 7.4 or higher
- MySQL database server

## Installation

1. Clone the repository:
   ```
   git clone <repository-url>
   ```
2. Place the project folder in your web server's root directory (e.g., `htdocs` for XAMPP).
3. Create a folder named `videos` in the project directory to store uploaded videos.

## Database Setup

1. Open `db.php` and ensure the database connection details are correct.
2. The script will automatically create the database (`video_db`) and the `videos` table if they do not already exist.

## Usage

1. Access the application through your web browser (e.g., `http://localhost/VIDEO UPLOAD/`).
2. Use the **Add Video** page to upload a video by providing a title, description, and video file.
3. Manage uploaded videos (edit or delete) via the home page.

## Notes

- Supported video formats: `mp4`, `webm`, `ogv`
- Uploaded videos are stored in the `videos/` directory.

## Screenshots

### Home Page
![Home Page](screenshots/home_page.png)

### Add Video Page
![Add Video Page](screenshots/add_video_page.png)

### Edit Video Page
![Edit Video Page](screenshots/edit_video_page.png)

## Contact

For questions or feedback, please reach out via the **Contact** page of the application.

## License

This project is open-source and available for modification or distribution.

