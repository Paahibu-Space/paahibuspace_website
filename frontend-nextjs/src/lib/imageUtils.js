// Utility function to get image URL from backend
export const getImageUrl = (imagePath) => {
  if (!imagePath) {
    return '/assets/frontend/images/no-image.webp';
  }

  // If it's already a full URL, return as is
  if (imagePath.startsWith('http://') || imagePath.startsWith('https://')) {
    return imagePath;
  }

  // If it's a relative path starting with '/', assume it's directly accessible
  if (imagePath.startsWith('/')) {
    return imagePath;
  }

  // If it's a path like 'assets/uploads/media-uploader/filename.jpg', prepend base URL if needed
  const baseUrl = process.env.NEXT_PUBLIC_API_URL || 'http://localhost:8000';
  if (imagePath.startsWith('assets/uploads/media-uploader/')) {
    return `${baseUrl}/${imagePath}`;
  }

  // Fallback for other cases, assume it's a path relative to public/
  return `/${imagePath}`;
};

