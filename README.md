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
   git clone https://github.com/kinza099/Video-Upload-Application-In-Php.git

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
![image](https://github.com/user-attachments/assets/64d058e4-f3d9-459f-96c8-0fa5c1aed919)

### Add Video Page
![image](https://github.com/user-attachments/assets/957ed47c-1da2-4274-933f-6fe520925372)

### About Us Page
![image](https://github.com/user-attachments/assets/5ff79868-24d8-49d2-b1d8-5fee01873046)


### Contact Us page
![image](https://github.com/user-attachments/assets/057c95a8-976c-4af9-b023-0a95419f9f4b)


## Contact

For questions or feedback, please reach out via the **Contact** page of the application.

## License

This project is open-source and available for modification or distribution.

