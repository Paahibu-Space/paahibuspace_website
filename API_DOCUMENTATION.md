# API Documentation

**Base URL**: `http://localhost:8000/api/v1` (Local Development) / `https://yourdomain.com/api/v1` (Production)

## Overview
This API provides read-only access to the simplified CMS content for the Paahibu Space frontend. All endpoints return JSON responses.

---

## 1. Stories
Retrieve spotlight stories, including filterable types.

### Get All Stories
- **Endpoint**: `GET /stories`
- **Description**: Returns a paginated list of published stories.
- **Parameters**: 
  - `page` (optional): Page number (e.g., `?page=1`)
- **Response**:
```json
{
  "data": [
    {
      "id": 1,
      "name": "Story Title",
      "slug": "story-slug",
      "image_url": "...",
      "story_type": { "name": "Alumni" },
      ...
    }
  ],
  "links": {...},
  "meta": {...}
}
```

### Get Single Story
- **Endpoint**: `GET /stories/{slug}`
- **Description**: Retrieve a full single story by its slug.

### Get Stories by Type
- **Endpoint**: `GET /stories/type/{type_slug}`
- **Description**: Retrieve stories filtered by their type slug (e.g., `alumni`, `entrepreneur`).

---

## 2. Team
Retrieve team members grouped by categories.

### Get All Team Members
- **Endpoint**: `GET /team`
- **Description**: Returns all active team members, ordered by their set order.

### Get Team by Category
- **Endpoint**: `GET /team/category/{category_slug}`
- **Description**: Retrieve team members belonging to a specific category (e.g., `leadership`, `staff`).

---

## 3. Partners
Retrieve partner organizations.

### Get All Partners
- **Endpoint**: `GET /partners`
- **Description**: Returns a list of all active partners/donors with their logos and website URLs.

---

## 4. Impact Stats
Retrieve impact statistics.

### Get Impact Stats
- **Endpoint**: `GET /impact-stats`
- **Description**: Returns a list of impact metrics (e.g., "500+ Students").

---

## 5. Blog
Retrieve news and blog posts.

### Get All Blog Posts
- **Endpoint**: `GET /blog`
- **Description**: Returns a paginated list of published blog posts.

### Get Single Blog Post
- **Endpoint**: `GET /blog/{slug}`
- **Description**: Retrieve a full blog post by its slug, including tags and author info.

### Get Blog by Category
- **Endpoint**: `GET /blog/category/{category_slug}`
- **Description**: Filter blog posts by category.

### Get Blog by Tag
- **Endpoint**: `GET /blog/tag/{tag_slug}`
- **Description**: Filter blog posts by tag.

---

## 6. Programs
Retrieve programs and join waitlists.

### Get All Programs
- **Endpoint**: `GET /programs`
- **Description**: Returns a list of all active programs with application status.
- **Response**:
```json
{
  "data": [
    {
      "id": 1,
      "name": "Tech Entrepreneurship Program",
      "slug": "tech-entrepreneurship-program",
      "application_status": "Open",
      "is_application_open": true,
      "application_link": "https://forms.example.com/apply",
      "application_start_date": "2026-01-01T00:00:00.000000Z",
      "application_end_date": "2026-12-31T23:59:59.000000Z"
    }
  ]
}
```

### Get Single Program
- **Endpoint**: `GET /programs/{slug}`
- **Description**: Retrieve a single program by its slug.

### Join Program Waitlist
- **Endpoint**: `POST /programs/{slug}/waitlist`
- **Description**: Submit a waitlist registration for a program.
- **Request Body**:
```json
{
  "name": "John Doe",
  "email": "john@example.com",
  "phone": "+1234567890",
  "location": "Nairobi",
  "notes": "Interested in the program"
}
```
- **Response**:
```json
{
  "message": "You have been added to the waitlist successfully.",
  "success": true
}
```

---

## 7. Annual Reports
Retrieve annual reports.

### Get All Annual Reports
- **Endpoint**: `GET /annual-reports`
- **Description**: Returns a list of all annual reports with PDF download links.

---

## 8. Newsletter
Subscribe to the newsletter.

### Subscribe
- **Endpoint**: `POST /newsletter/subscribe`
- **Description**: Subscribe an email to the newsletter.
- **Request Body**:
```json
{
  "email": "user@example.com"
}
```
- **Response**:
```json
{
  "success": true,
  "message": "Subscribed successfully."
}
```

---

## 9. Metadata (Dropdowns)
Helper endpoints to populate dynamic filters on the frontend.

- **Story Types**: `GET /meta/story-types`
- **Programs**: `GET /meta/programs` (List of active programs)
- **Blog Categories**: `GET /meta/blog-categories`
