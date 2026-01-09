'use client';

import { useEffect } from 'react';
import { Swiper, SwiperSlide } from 'swiper/react';
import { Navigation, Autoplay } from 'swiper/modules';
import { BiChevronLeft, BiChevronRight } from 'react-icons/bi';
import { getImageUrl } from '@/lib/imageUtils';
import '@/app/stories-section.css';

const StoriesSection = ({ stories = [] }) => {
  useEffect(() => {
    if (typeof window !== 'undefined' && window.AOS) {
      window.AOS.init();
    }
  }, []);

  // Function to truncate text to a specific length
  const truncateText = (text, maxLength = 150) => {
    if (!text) return '';
    const cleanText = typeof text === 'string' ? text.replace(/<[^>]*>/g, '') : String(text);
    if (cleanText.length <= maxLength) return cleanText;
    return cleanText.substring(0, maxLength).trim() + '...';
  };

  return (
    <section
      className="testimonial-three-area"
      style={{
        backgroundImage: "url('/assets/frontend/images/bg/stories-bg.png')",
        backgroundSize: 'cover',
        backgroundPosition: 'center',
        padding: '100px 0',
        position: 'relative',
        overflow: 'hidden'
      }}
    >
      {/* Gradient overlay */}
      <div
        style={{
          position: 'absolute',
          top: 0,
          left: 0,
          right: 0,
          bottom: 0,
          background: 'linear-gradient(135deg, rgba(102, 126, 234, 0.05) 0%, rgba(118, 75, 162, 0.05) 100%)',
          pointerEvents: 'none'
        }}
      />
      
      <div className="testimonial-three__wrp" style={{ position: 'relative', zIndex: 1 }}>
        <div className="container">
          <div className="row g-4">
            <div className="col-md-6 col-lg-5 col-xl-3">
              <div className="section-header margin-bottom-40" data-aos="fade-up">
                <h5
                  style={{
                    fontSize: '14px',
                    fontWeight: 700,
                    textTransform: 'uppercase',
                    letterSpacing: '2px',
                    color: '#667eea',
                    marginBottom: '15px',
                    display: 'inline-block',
                    padding: '8px 20px',
                    background: 'linear-gradient(135deg, rgba(102, 126, 234, 0.1) 0%, rgba(118, 75, 162, 0.1) 100%)',
                    borderRadius: '50px'
                  }}
                >
                  Our Impact Stories
                </h5>
                <h2
                  style={{
                    fontSize: 'clamp(1.8rem, 4vw, 2.5rem)',
                    fontWeight: 800,
                    lineHeight: 1.3,
                    marginBottom: '30px',
                    background: 'linear-gradient(135deg, #1a1a1a 0%, #4a5568 100%)',
                    WebkitBackgroundClip: 'text',
                    WebkitTextFillColor: 'transparent',
                    backgroundClip: 'text'
                  }}
                >
                  Hundreds of Female entrepreneurs are changing the world
                </h2>
                <div
                  className="testimonial-three__arry-btn d-flex gap-3"
                  data-aos="fade-up"
                  data-aos-delay="200"
                >
                  <button
                    className="arry-prev testimonial-three__arry-prev"
                    style={{
                      width: '50px',
                      height: '50px',
                      borderRadius: '50%',
                      border: '2px solid #667eea',
                      background: 'rgba(255, 255, 255, 0.9)',
                      backdropFilter: 'blur(10px)',
                      color: '#667eea',
                      display: 'flex',
                      alignItems: 'center',
                      justifyContent: 'center',
                      cursor: 'pointer',
                      transition: 'all 0.3s ease',
                      fontSize: '20px',
                      boxShadow: '0 2px 8px rgba(0, 0, 0, 0.08)'
                    }}
                    onMouseEnter={(e) => {
                      e.target.style.background = 'linear-gradient(135deg, #667eea 0%, #764ba2 100%)';
                      e.target.style.color = '#fff';
                      e.target.style.transform = 'translateY(-3px)';
                      e.target.style.boxShadow = '0 4px 16px rgba(102, 126, 234, 0.3)';
                    }}
                    onMouseLeave={(e) => {
                      e.target.style.background = 'rgba(255, 255, 255, 0.9)';
                      e.target.style.color = '#667eea';
                      e.target.style.transform = 'translateY(0)';
                      e.target.style.boxShadow = '0 2px 8px rgba(0, 0, 0, 0.08)';
                    }}
                  >
                    <BiChevronLeft />
                  </button>
                  <button
                    className="arry-next testimonial-three__arry-next active"
                    style={{
                      width: '50px',
                      height: '50px',
                      borderRadius: '50%',
                      border: '2px solid #667eea',
                      background: 'linear-gradient(135deg, #667eea 0%, #764ba2 100%)',
                      color: '#fff',
                      display: 'flex',
                      alignItems: 'center',
                      justifyContent: 'center',
                      cursor: 'pointer',
                      transition: 'all 0.3s ease',
                      fontSize: '20px',
                      boxShadow: '0 4px 16px rgba(102, 126, 234, 0.3)'
                    }}
                    onMouseEnter={(e) => {
                      e.target.style.transform = 'translateY(-3px)';
                      e.target.style.boxShadow = '0 6px 20px rgba(102, 126, 234, 0.4)';
                    }}
                    onMouseLeave={(e) => {
                      e.target.style.transform = 'translateY(0)';
                      e.target.style.boxShadow = '0 4px 16px rgba(102, 126, 234, 0.3)';
                    }}
                  >
                    <BiChevronRight />
                  </button>
                </div>
              </div>
            </div>
            <div className="col-md-6 col-lg-7 col-xl-9">
              <Swiper
                modules={[Navigation, Autoplay]}
                spaceBetween={30}
                slidesPerView={1}
                autoplay={{
                  delay: 5000,
                  disableOnInteraction: false,
                }}
                navigation={{
                  nextEl: '.testimonial-three__arry-next',
                  prevEl: '.testimonial-three__arry-prev',
                }}
                breakpoints={{
                  640: {
                    slidesPerView: 2,
                    spaceBetween: 20,
                  },
                  992: {
                    slidesPerView: 2,
                    spaceBetween: 30,
                  },
                  1200: {
                    slidesPerView: 3,
                    spaceBetween: 30,
                  },
                }}
                className="testimonial-three__slider"
                style={{ paddingBottom: '20px' }}
              >
                {stories.map((story) => {
                  const imageUrl = getImageUrl(story.image);

                  return (
                    <SwiperSlide key={story.id}>
                      <div
                        className="testimonial-three__item"
                        style={{
                          background: '#fff',
                          borderRadius: '20px',
                          padding: '35px',
                          boxShadow: '0 4px 16px rgba(0, 0, 0, 0.12)',
                          transition: 'all 0.4s ease',
                          border: '1px solid rgba(0, 0, 0, 0.05)',
                          height: '100%',
                          display: 'flex',
                          flexDirection: 'column',
                          minHeight: '400px',
                          maxHeight: '450px',
                          position: 'relative',
                          overflow: 'hidden'
                        }}
                        onMouseEnter={(e) => {
                          e.currentTarget.style.transform = 'translateY(-8px)';
                          e.currentTarget.style.boxShadow = '0 8px 32px rgba(0, 0, 0, 0.16)';
                        }}
                        onMouseLeave={(e) => {
                          e.currentTarget.style.transform = 'translateY(0)';
                          e.currentTarget.style.boxShadow = '0 4px 16px rgba(0, 0, 0, 0.12)';
                        }}
                      >
                        {/* Top accent bar */}
                        <div
                          style={{
                            position: 'absolute',
                            top: 0,
                            left: 0,
                            right: 0,
                            height: '4px',
                            background: 'linear-gradient(135deg, #667eea 0%, #764ba2 100%)',
                            transform: 'scaleX(0)',
                            transformOrigin: 'left',
                            transition: 'transform 0.4s ease'
                          }}
                          onMouseEnter={(e) => {
                            e.currentTarget.style.transform = 'scaleX(1)';
                          }}
                        />
                        
                        <div className="d-flex align-items-center gap-3" style={{ marginBottom: '20px' }}>
                          <div
                            className="testimonial-three__image"
                            style={{
                              position: 'relative',
                              flexShrink: 0
                            }}
                          >
                            <svg
                              width="24"
                              height="18"
                              viewBox="0 0 24 18"
                              fill="none"
                              xmlns="http://www.w3.org/2000/svg"
                              style={{
                                position: 'absolute',
                                left: '50%',
                                bottom: '-12px',
                                transform: 'translateX(-50%)',
                                zIndex: 2
                              }}
                            >
                              <path
                                d="M0 0V18L9 9V0H0ZM15 0V18L24 9V0H15Z"
                                fill="#667eea"
                              />
                            </svg>
                            <img
                              src={imageUrl}
                              alt={story.title || 'Story'}
                              className="testimonial-img"
                              style={{
                                borderRadius: '50%',
                                objectFit: 'cover',
                                width: '80px',
                                height: '80px',
                                border: '3px solid #fff',
                                boxShadow: '0 4px 12px rgba(102, 126, 234, 0.2)',
                                display: 'block'
                              }}
                              onError={(e) => {
                                e.target.src = '/assets/frontend/images/no-image.webp';
                              }}
                            />
                          </div>
                          <div className="con" style={{ flex: 1, minWidth: 0 }}>
                            <h4
                              style={{
                                fontSize: '1.2rem',
                                fontWeight: 700,
                                marginBottom: '8px',
                                color: '#1a1a1a',
                                lineHeight: 1.3,
                                overflow: 'hidden',
                                textOverflow: 'ellipsis',
                                display: '-webkit-box',
                                WebkitLineClamp: 2,
                                WebkitBoxOrient: 'vertical'
                              }}
                            >
                              {story.title || 'Untitled Story'}
                            </h4>
                            <span
                              style={{
                                fontSize: '0.9rem',
                                color: '#667eea',
                                fontWeight: 600,
                                display: 'block',
                                overflow: 'hidden',
                                textOverflow: 'ellipsis',
                                whiteSpace: 'nowrap'
                              }}
                            >
                              {story.tags || 'Impact Story'}
                            </span>
                          </div>
                        </div>
                        <div
                          className="story-content"
                          style={{
                            marginTop: 'auto',
                            paddingTop: '20px',
                            borderTop: '1px solid rgba(0, 0, 0, 0.08)'
                          }}
                        >
                          <p
                            style={{
                              fontSize: '15px',
                              lineHeight: 1.7,
                              color: '#666',
                              margin: 0,
                              display: '-webkit-box',
                              WebkitLineClamp: 4,
                              WebkitBoxOrient: 'vertical',
                              overflow: 'hidden',
                              minHeight: '100px',
                              maxHeight: '120px'
                            }}
                          >
                            "{truncateText(story.excerpt, 200)}"
                          </p>
                        </div>
                      </div>
                    </SwiperSlide>
                  );
                })}
              </Swiper>
            </div>
          </div>
        </div>
      </div>

      <style jsx>{`
        .testimonial-three__item:hover .testimonial-three__item::before {
          transform: scaleX(1);
        }
        
        .swiper-slide {
          height: auto;
        }
        
        .testimonial-three__slider .swiper-slide {
          display: flex;
          height: auto;
        }
      `}</style>
    </section>
  );
};

export default StoriesSection;

