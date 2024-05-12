<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Backend\AdminDashboardController;
use Illuminate\Support\Facades\Route;

/*--------------------------------------
    Frontend Routes
------------------------------------- */

Route::get('/', 'App\Http\Controllers\Frontend\FrontendController@index')->name('homepage');
Route::get('/about', 'App\Http\Controllers\Frontend\FrontendController@showAboutPage')->name('frontend.about');
Route::get('/programs', 'App\Http\Controllers\Frontend\FrontendController@showProgramsPage')->name('frontend.programs');
Route::get('/services', 'App\Http\Controllers\Frontend\FrontendController@showServicesPage')->name('frontend.services');
Route::get('/blogs', 'App\Http\Controllers\Frontend\FrontendController@showBlogsPage')->name('frontend.blogs');
Route::get('/team', 'App\Http\Controllers\Frontend\FrontendController@showTeamPage')->name('frontend.team');
Route::get('/volunteers', 'App\Http\Controllers\Frontend\FrontendController@showVolunteersPage')->name('frontend.volunteers');

/*=======================================================
******************** ADMIN LOGIN ROUTES **********************
=======================================================*/

    Route::get('login/admin', 'App\Http\Controllers\Auth\LoginController@showAdminLoginForm')->name('admin.login');
    Route::post('login/admin', 'App\Http\Controllers\Auth\LoginController@adminLogin');
    Route::post('/logout/admin', 'App\Http\Controllers\Backend\AdminDashboardController@adminLogout')->name('admin.logout');

  

/*--------------------------------------
    ALL ADMIN PANEL ROUTES
------------------------------------- */
Route::prefix('admin-home')->group(function () {

    Route::get('/', [AdminDashboardController::class, 'adminIndex'])->name('admin.home');


    /* --------------------------
        MAINTAINS PAGE
    -------------------------- */
    Route::get('/maintains-page/settings', 'MaintainsPageController@maintains_page_settings')->name('admin.maintains.page.settings');
    Route::post('/maintains-page/settings', 'MaintainsPageController@update_maintains_page_settings');


    /*---------------------------
        ADMIN SETTINGS
    ----------------------------*/
    Route::get('/settings', 'App\Http\Controllers\Backend\AdminDashboardController@admin_settings')->name('admin.profile.settings');
    Route::get('/profile-update', 'App\Http\Controllers\Backend\AdminDashboardController@admin_profile')->name('admin.profile.update');
    Route::post('/profile-update', 'App\Http\Controllers\Backend\AdminDashboardController@admin_profile_update');
    Route::get('/password-change', 'App\Http\Controllers\Backend\AdminDashboardController@admin_password')->name('admin.password.change');
    Route::post('/password-change', 'App\Http\Controllers\Backend\AdminDashboardController@admin_password_chagne');
    Route::post('/set-static-option', 'App\Http\Controllers\Backend\AdminDashboardController@admin_set_static_option');
    Route::post('/get-static-option', 'App\Http\Controllers\Backend\AdminDashboardController@admin_get_static_option');
    Route::post('/update-static-option', 'App\Http\Controllers\Backend\AdminDashboardController@admin_update_static_option');

    /*-----------------------------------
          KNOWLEDGEBASE ROUTES
    ------------------------------------*/
    Route::prefix('knowledge')->middleware(['adminPermissionCheck:Knowledgebase', 'moduleCheck:knowledgebase_module_status'])->group(function () {

        Route::get('/', 'App\Http\Controllers\Backend\KnowledgebaseController@all_knowledgebases')->name('admin.knowledge.all');
        Route::get('/new', 'App\Http\Controllers\Backend\KnowledgebaseController@new_knowledgebase')->name('admin.knowledge.new');
        Route::post('/new', 'App\Http\Controllers\Backend\KnowledgebaseController@store_knowledgebases');
        Route::get('/edit/{id}', 'App\Http\Controllers\Backend\KnowledgebaseController@edit_knowledgebases')->name('admin.knowledge.edit');
        Route::post('/update', 'App\Http\Controllers\Backend\KnowledgebaseController@update_knowledgebases')->name('admin.knowledge.update');
        Route::post('/delete/{id}', 'App\Http\Controllers\Backend\KnowledgebaseController@delete_knowledgebases')->name('admin.knowledge.delete');
        Route::post('/clone', 'App\Http\Controllers\Backend\KnowledgebaseController@clone_knowledgebases')->name('admin.knowledge.clone');
        Route::post('/bulk-action', 'App\Http\Controllers\Backend\KnowledgebaseController@bulk_action')->name('admin.knowledge.bulk.action');
        Route::post('/slug-check', 'App\Http\Controllers\Backend\KnowledgebaseController@slug_check')->name('admin.knowledge.slug.check');

        /*-----------------------------------
         KNOWLEDGEBASE: CATEGORY ROUTES
       ------------------------------------*/
        Route::group(['prefix' => 'category'], function () {
            Route::get('/', 'App\Http\Controllers\Backend\KnowledgebaseTopicsController@all_knowledgebase_category')->name('admin.knowledge.category.all');
            Route::post('/new', 'App\Http\Controllers\Backend\KnowledgebaseTopicsController@store_knowledgebase_category')->name('admin.knowledge.category.new');
            Route::post('/update', 'App\Http\Controllers\Backend\KnowledgebaseTopicsController@update_knowledgebase_category')->name('admin.knowledge.category.update');
            Route::post('/delete/{id}', 'App\Http\Controllers\Backend\KnowledgebaseTopicsController@delete_knowledgebase_category')->name('admin.knowledge.category.delete');
            Route::post('/lang', 'App\Http\Controllers\Backend\KnowledgebaseTopicsController@category_by_language_slug')->name('admin.knowledge.category.by.lang');
            Route::post('/bulk-action', 'App\Http\Controllers\Backend\KnowledgebaseTopicsController@bulk_action')->name('admin.knowledge.category.bulk.action');
        });
    });

    /*==============================================
          SERVICES MODULE
    ==============================================*/
    Route::prefix('services')->middleware(['adminPermissionCheck:Services'])->group(function () {
        /*-----------------------------------
         SERVICES MODULE : SERVICES ROUTES
        ------------------------------------*/
        Route::get('/', 'App\Http\Controllers\Backend\ServiceController@index')->name('admin.services');
        Route::post('/', 'App\Http\Controllers\Backend\ServiceController@store');
        Route::get('/new', 'App\Http\Controllers\Backend\ServiceController@new_service')->name('admin.services.new');
        Route::get('/edit/{id}', 'App\Http\Controllers\Backend\ServiceController@edit_service')->name('admin.services.edit');
        Route::post('/cat-by-slug', 'App\Http\Controllers\Backend\ServiceController@category_by_slug')->name('admin.service.category.by.slug');
        Route::post('/price-plan-by-slug', 'App\Http\Controllers\Backend\ServiceController@price_plan_by_slug')->name('admin.service.price.plan.by.slug');
        Route::post('/update', 'App\Http\Controllers\Backend\ServiceController@update')->name('admin.services.update');
        Route::post('/clone', 'App\Http\Controllers\Backend\ServiceController@clone_service_as_draft')->name('admin.services.clone');
        Route::post('/bulk-action', 'App\Http\Controllers\Backend\ServiceController@bulk_action')->name('admin.services.bulk.action');
        Route::post('/delete/{id}', 'App\Http\Controllers\Backend\ServiceController@delete')->name('admin.services.delete');
        Route::post('/slug-check', 'App\Http\Controllers\Backend\ServiceController@slug_check')->name('admin.services.slug.check');
        /*-----------------------------------
            SERVICES MODULE : CATEGORY ROUTES
         ------------------------------------*/
        Route::group(['prefix' => 'category'], function () {
            Route::get('/', 'App\Http\Controllers\Backend\ServiceController@category_index')->name('admin.service.category');
            Route::post('/', 'App\Http\Controllers\Backend\ServiceController@category_store');
            Route::post('/update', 'App\Http\Controllers\Backend\ServiceController@category_update')->name('admin.service.category.update');
            Route::post('/delete/{id}', 'App\Http\Controllers\Backend\ServiceController@category_delete')->name('admin.service.category.delete');
            Route::post('/bulk-action', 'App\Http\Controllers\Backend\ServiceController@category_bulk_action')->name('admin.service.category.bulk.action');
        });
    });

    /*==============================================
        IMAGE GALLERY ROUTES
    ==============================================*/

    Route::prefix('video-gallery')->middleware(['adminPermissionCheck:Video Gallery'])->group(function () {
        Route::get('/', 'Admin\VideoGalleryController@index')->name('admin.video.gallery.all');
        Route::post('/new', 'Admin\VideoGalleryController@store')->name('admin.video.gallery.new');
        Route::post('/update', 'Admin\VideoGalleryController@update')->name('admin.video.gallery.update');
        Route::post('/delete/{id}', 'Admin\VideoGalleryController@delete')->name('admin.video.gallery.delete');
        Route::post('/bulk-action', 'Admin\VideoGalleryController@bulk_action')->name('admin.video.gallery.bulk.action');
        Route::get('/page-settings', 'Admin\VideoGalleryController@page_settings')->name('admin.video.gallery.page.settings');
        Route::post('/page-settings', 'Admin\VideoGalleryController@update_page_settings');
    });
    /*==============================================
        IMAGE GALLERY ROUTES
    ==============================================*/

    Route::prefix('gallery-page')->middleware(['adminPermissionCheck:Gallery Page'])->group(function () {
        Route::get('/', 'ImageGalleryPageController@index')->name('admin.gallery.all');
        Route::post('/new', 'ImageGalleryPageController@store')->name('admin.gallery.new');
        Route::post('/update', 'ImageGalleryPageController@update')->name('admin.gallery.update');
        Route::post('/delete/{id}', 'ImageGalleryPageController@delete')->name('admin.gallery.delete');
        Route::post('/bulk-action', 'ImageGalleryPageController@bulk_action')->name('admin.gallery.bulk.action');
        Route::get('/page-settings', 'ImageGalleryPageController@page_settings')->name('admin.gallery.page.settings');
        Route::post('/page-settings', 'ImageGalleryPageController@update_page_settings');
        /*------------------------
            IMAGE CATEGORY
        -------------------------*/
        Route::group(['prefix' => 'category'], function () {
            Route::get('/', 'ImageGalleryPageController@category_index')->name('admin.gallery.category');
            Route::post('/new', 'ImageGalleryPageController@category_store')->name('admin.gallery.category.new');
            Route::post('/update', 'ImageGalleryPageController@category_update')->name('admin.gallery.category.update');
            Route::post('/delete/{id}', 'ImageGalleryPageController@category_delete')->name('admin.gallery.category.delete');
            Route::post('/bulk-action', 'ImageGalleryPageController@category_bulk_action')->name('admin.gallery.category.bulk.action');
        });
        Route::post('/category-by-slug', 'ImageGalleryPageController@category_by_slug')->name('admin.gallery.category.by.lang');
    });

    /*==============================================
        TEAM MEMBER PAGE ROUTES
    ==============================================*/
    Route::prefix('team-member')->middleware(['adminPermissionCheck:Team Members'])->group(function () {
        //team member
        Route::get('/', 'App\Http\Controllers\Backend\TeamMemberController@index')->name('admin.team.member');
        Route::post('/', 'App\Http\Controllers\Backend\TeamMemberController@store');
        Route::post('/update', 'App\Http\Controllers\Backend\TeamMemberController@update')->name('admin.team.member.update');
        Route::post('/delete/{id}', 'App\Http\Controllers\Backend\TeamMemberController@delete')->name('admin.team.member.delete');
        Route::post('/bulk-action', 'App\Http\Controllers\Backend\TeamMemberController@bulk_action')->name('admin.team.member.bulk.action');
    });

    /*==============================================
        TEAM MEMBER PAGE ROUTES
    ==============================================*/
    Route::prefix('team-member')->middleware(['adminPermissionCheck:Team Members'])->group(function () {
        //team member
        Route::get('/', 'App\Http\Controllers\Backend\TeamMemberController@index')->name('admin.team.member');
        Route::post('/', 'App\Http\Controllers\Backend\TeamMemberController@store');
        Route::post('/update', 'App\Http\Controllers\Backend\TeamMemberController@update')->name('admin.team.member.update');
        Route::post('/delete/{id}', 'App\Http\Controllers\Backend\TeamMemberController@delete')->name('admin.team.member.delete');
        Route::post('/bulk-action', 'App\Http\Controllers\Backend\TeamMemberController@bulk_action')->name('admin.team.member.bulk.action');
    });

    /*======================================
        EMAIL TEMPLATE SETTINGS
    =======================================*/
    Route::prefix('email-template')->middleware(['auth:admin', 'adminPermissionCheck:Email Templates'])->namespace('Admin')->group(function () {
        Route::get('/all', 'App\Http\Controllers\Backend\EmailTemplateController@all')->name('admin.email.template.all');

        /*-------------------------------------------
            ADMIN PASSWORD RESET ROUTES
        ---------------------------------------------*/
        Route::get('/admin-password-reset', 'App\Http\Controllers\Backend\EmailTemplateController@admin_password_reset')->name('admin.email.template.admin.password.reset');
        Route::post('/admin-password-reset', 'App\Http\Controllers\Backend\EmailTemplateController@update_admin_password_reset');

        /*-------------------------------------------
          USER PASSWORD RESET ROUTES
        ---------------------------------------------*/
        Route::get('/user-password-reset', 'App\Http\Controllers\Backend\EmailTemplateController@user_password_reset')->name('admin.email.template.user.password.reset');
        Route::post('/user-password-reset', 'App\Http\Controllers\Backend\EmailTemplateController@update_user_password_reset');

        /*-------------------------------------------
         USER EMAIL VERIFY ROUTES
        ---------------------------------------------*/
        Route::get('/user-email-verify', 'App\Http\Controllers\Backend\EmailTemplateController@user_email_verify')->name('admin.email.template.user.email.verify');
        Route::post('/user-email-verify', 'App\Http\Controllers\Backend\EmailTemplateController@update_user_email_verify');

        /*-------------------------------------------
            NEWSLETTER VERIFY ROUTES
        ---------------------------------------------*/
        Route::get('/newsletter-verify', 'App\Http\Controllers\Backend\EmailTemplateController@newsletter_verify')->name('admin.email.template.newsletter.verify');
        Route::post('/newsletter-verify', 'App\Http\Controllers\Backend\EmailTemplateController@update_newsletter_verify');

        /*==========================================
            EVENT EMAIL TEMPLATE ROUTE
        ==========================================*/

        /* event order mail admin */
        Route::get('/event-attendance-mail-admin', 'EventApp\Http\Controllers\Backend\EmailTemplateController@event_attendance_mail_admin')->name('admin.email.template.event.attendance.mail.admin');
        Route::post('/event-attendance-mail-admin', 'EventApp\Http\Controllers\Backend\EmailTemplateController@update_event_attendance_mail_admin');

        /* event order mail user */
        Route::get('/event-attendance-mail-user', 'EventApp\Http\Controllers\Backend\EmailTemplateController@event_attendance_mail_user')->name('admin.email.template.event.attendance.mail.user');
        Route::post('/event-attendance-mail-user', 'EventApp\Http\Controllers\Backend\EmailTemplateController@update_event_attendance_mail_user');

        /* event order reminder mail */
        Route::get('/event-attendance-mail-reminder-mail', 'EventApp\Http\Controllers\Backend\EmailTemplateController@event_attendance_mail_reminder_mail')->name('admin.email.template.event.attendance.mail.reminder.mail');
        Route::post('/event-attendance-mail-reminder-mail', 'EventApp\Http\Controllers\Backend\EmailTemplateController@update_event_attendance_mail_reminder_mail');
    });

    /*==============================================
         NEWSLETTER ROUTES
     ==============================================*/
    Route::prefix('newsletter')->middleware(['adminPermissionCheck:Newsletter Manage'])->group(function () {
        Route::get('/', 'App\Http\Controllers\Backend\NewsletterController@index')->name('admin.newsletter');
        Route::post('/delete/{id}', 'App\Http\Controllers\Backend\NewsletterController@delete')->name('admin.newsletter.delete');
        Route::post('/single', 'App\Http\Controllers\Backend\NewsletterController@send_mail')->name('admin.newsletter.single.mail');
        Route::get('/all', 'App\Http\Controllers\Backend\NewsletterController@send_mail_all_index')->name('admin.newsletter.mail');
        Route::post('/all', 'App\Http\Controllers\Backend\NewsletterController@send_mail_all');
        Route::post('/new', 'App\Http\Controllers\Backend\NewsletterController@add_new_sub')->name('admin.newsletter.new.add');
        Route::post('/bulk-action', 'App\Http\Controllers\Backend\NewsletterController@bulk_action')->name('admin.newsletter.bulk.action');
        Route::post('/verify-mail-send', 'App\Http\Controllers\Backend\NewsletterController@verify_mail_send')->name('admin.newsletter.verify.mail.send');
    });

    /*==============================================
            MEDIA UPLOAD ROUTES
     ==============================================*/
    Route::prefix('media-upload')->group(function () {
        Route::post('/delete', 'App\Http\Controllers\Backend\MediaUploadController@delete_upload_media_file')->name('admin.upload.media.file.delete');
        Route::get('/page', 'App\Http\Controllers\Backend\MediaUploadController@all_upload_media_images_for_page')->name('admin.upload.media.images.page');
        Route::post('/alt', 'App\Http\Controllers\Backend\MediaUploadController@alt_change_upload_media_file')->name('admin.upload.media.file.alt.change');
    });

    /*==============================================
       BLOGS
    ==============================================*/
    Route::prefix('blog')->middleware(['adminPermissionCheck:Blogs Manage'])->group(function () {
        /*-------------------------
          BLOG ROUTES
        --------------------------*/
        Route::get('/', 'App\Http\Controllers\Backend\BlogController@index')->name('admin.blog');
        Route::get('/new', 'App\Http\Controllers\Backend\BlogController@new_blog')->name('admin.blog.new');
        Route::post('/new', 'App\Http\Controllers\Backend\BlogController@store_new_blog');
        Route::post('/clone', 'App\Http\Controllers\Backend\BlogController@clone_blog')->name('admin.blog.clone');
        Route::get('/edit/{id}', 'App\Http\Controllers\Backend\BlogController@edit_blog')->name('admin.blog.edit');
        Route::post('/update/{id}', 'App\Http\Controllers\Backend\BlogController@update_blog')->name('admin.blog.update');
        Route::post('/delete/{id}', 'App\Http\Controllers\Backend\BlogController@delete_blog')->name('admin.blog.delete');
        Route::post('/bulk-action', 'App\Http\Controllers\Backend\BlogController@bulk_action')->name('admin.blog.bulk.action');
        Route::post('/slug-check', 'App\Http\Controllers\Backend\BlogController@slug_check')->name('admin.blog.slug.check');

        /*-------------------------
          BLOG CATEGORIES ROUTES
        --------------------------*/
        Route::group(['prefix' => 'category'], function () {
            Route::get('/', 'App\Http\Controllers\Backend\BlogController@category')->name('admin.blog.category');
            Route::post('/', 'App\Http\Controllers\Backend\BlogController@new_category');
            Route::post('/delete/{id}', 'App\Http\Controllers\Backend\BlogController@delete_category')->name('admin.blog.category.delete');
            Route::post('/update', 'App\Http\Controllers\Backend\BlogController@update_category')->name('admin.blog.category.update');
            Route::post('/bulk-action', 'App\Http\Controllers\Backend\BlogController@category_bulk_action')->name('admin.blog.category.bulk.action');
        });
    });

    /*==============================================
       STORIES
    ==============================================*/
    Route::prefix('stories')->middleware(['adminPermissionCheck:Stories Manage'])->group(function () {
        /*-------------------------
          STORIES ROUTES
        --------------------------*/
        Route::get('/', 'App\Http\Controllers\Backend\StoriesController@index')->name('admin.story');
        Route::get('/new', 'App\Http\Controllers\Backend\StoriesController@new_story')->name('admin.story.new');
        Route::post('/new', 'App\Http\Controllers\Backend\StoriesController@store_new_story');
        Route::post('/clone', 'App\Http\Controllers\Backend\StoriesController@clone_story')->name('admin.story.clone');
        Route::get('/edit/{id}', 'App\Http\Controllers\Backend\StoriesController@edit_story')->name('admin.story.edit');
        Route::post('/update/{id}', 'App\Http\Controllers\Backend\StoriesController@update_story')->name('admin.story.update');
        Route::post('/delete/{id}', 'App\Http\Controllers\Backend\StoriesController@delete_story')->name('admin.story.delete');
        Route::post('/bulk-action', 'App\Http\Controllers\Backend\StoriesController@bulk_action')->name('admin.story.bulk.action');
        Route::post('/slug-check', 'App\Http\Controllers\Backend\StoriesController@slug_check')->name('admin.story.slug.check');
    });

    /*==============================================
     404 PAGE ROUTES
    ==============================================*/
    Route::prefix('404-page-manage')->middleware(['adminPermissionCheck:404 Page Manage'])->group(function () {
        Route::get('/', 'Error404PageManage@error_404_page_settings')->name('admin.404.page.settings');
        Route::post('/', 'Error404PageManage@update_error_404_page_settings');
    });

    /*==============================================
        TESTIMONIAL ROUTES
     ==============================================*/
    Route::prefix('testimonial')->middleware(['adminPermissionCheck:Testimonial'])->group(function () {
        Route::get('/', 'App\Http\Controllers\Backend\TestimonialController@index')->name('admin.testimonial');
        Route::post('/', 'App\Http\Controllers\Backend\TestimonialController@store');
        Route::post('/clone', 'App\Http\Controllers\Backend\TestimonialController@clone')->name('admin.testimonial.clone');
        Route::post('/update', 'App\Http\Controllers\Backend\TestimonialController@update')->name('admin.testimonial.update');
        Route::post('/delete/{id}', 'App\Http\Controllers\Backend\TestimonialController@delete')->name('admin.testimonial.delete');
        Route::post('/bulk-action', 'App\Http\Controllers\Backend\TestimonialController@bulk_action')->name('admin.testimonial.bulk.action');
    });

    /*==============================================
           EVENTS MODULE ROUTES
     ==============================================*/
    Route::prefix('events')->middleware(['adminPermissionCheck:Events Manage', 'moduleCheck:events_module_status'])->group(function () {

        /*----------------------------------------
            EVENTS MODULE: ROUTEs
        ----------------------------------------*/
        Route::get('/all', 'App\Http\Controllers\Backend\EventsController@all_events')->name('admin.events.all');
        Route::get('/new', 'App\Http\Controllers\Backend\EventsController@new_event')->name('admin.events.new');
        Route::post('/new', 'App\Http\Controllers\Backend\EventsController@store_event');
        Route::get('/edit/{id}', 'App\Http\Controllers\Backend\EventsController@edit_event')->name('admin.events.edit');
        Route::post('/update', 'App\Http\Controllers\Backend\EventsController@update_event')->name('admin.events.update');
        Route::post('/delete/{id}', 'App\Http\Controllers\Backend\EventsController@delete_event')->name('admin.events.delete');
        Route::post('/clone', 'App\Http\Controllers\Backend\EventsController@clone_event')->name('admin.events.clone');
        Route::post('/bulk-action', 'App\Http\Controllers\Backend\EventsController@bulk_action')->name('admin.events.bulk.action');
        Route::post('/slug-check', 'App\Http\Controllers\Backend\EventsController@slug_check')->name('admin.events.slug.check');
        /*----------------------------------------
            EVENTS MODULE: SUCCESS PAGE SETTINGS
        ----------------------------------------*/

        Route::get('/payment-success-page-settings', 'App\Http\Controllers\Backend\EventsController@payment_success_page_settings')->name('admin.events.payment.success.page.settings');
        Route::post('/payment-success-page-settings', 'App\Http\Controllers\Backend\EventsController@update_payment_success_page_settings');

        /*----------------------------------------
         EVENTS MODULE: ATTENDANCE SETTINGS
       ----------------------------------------*/
        //event attendance logs
        Route::group(['prefix' => 'attendance'], function () {
            Route::get('/all', 'App\Http\Controllers\Backend\EventsController@event_attendance_logs')->name('admin.event.attendance.logs');
            Route::post('/all', 'App\Http\Controllers\Backend\EventsController@update_event_attendance_logs_status');
            Route::post('/delete/{id}', 'App\Http\Controllers\Backend\EventsController@delete_event_attendance_logs')->name('admin.event.attendance.logs.delete');
            Route::post('/send-mail', 'App\Http\Controllers\Backend\EventsController@send_mail_event_attendance_logs')->name('admin.event.attendance.send.mail');
            Route::post('/bulk-action', 'App\Http\Controllers\Backend\EventsController@attendance_logs_bulk_action')->name('admin.event.attendance.bulk.action');
        });

        /*----------------------------------------
        EVENTS MODULE: CATEGORY ROUTES
         ----------------------------------------*/
        Route::group(['prefix' => 'category'], function () {
            //event category
            Route::get('/', 'App\Http\Controllers\Backend\EventsCategoryController@all_events_category')->name('admin.events.category.all');
            Route::post('/new', 'App\Http\Controllers\Backend\EventsCategoryController@store_events_category')->name('admin.events.category.new');
            Route::post('/update', 'App\Http\Controllers\Backend\EventsCategoryController@update_events_category')->name('admin.events.category.update');
            Route::post('/delete/{id}', 'App\Http\Controllers\Backend\EventsCategoryController@delete_events_category')->name('admin.events.category.delete');
            Route::post('/lang', 'App\Http\Controllers\Backend\EventsCategoryController@Category_by_language_slug')->name('admin.events.category.by.lang');
            Route::post('/bulk-action', 'App\Http\Controllers\Backend\EventsCategoryController@bulk_action')->name('admin.events.category.bulk.action');
        });

        /*----------------------------------------
        EVENTS MODULE: OTHERS ROUTES
        ----------------------------------------*/
        Route::post('/event-attendance/reminder', 'App\Http\Controllers\Backend\EventsController@event_attedance_reminder')->name('admin.event.attendance.reminder');
        Route::get('/attendance/report', 'App\Http\Controllers\Backend\EventsController@attendance_report')->name('admin.event.attendance.report');
    });

    /*==============================================
             CASE STUDY MODULE ROUTES
    ==============================================*/
    Route::prefix('works')->middleware(['adminPermissionCheck:Case Study'])->group(function () {

        Route::get('/', 'App\Http\Controllers\Backend\WorksController@index')->name('admin.work');
        Route::post('/', 'App\Http\Controllers\Backend\WorksController@store');
        Route::get('/new', 'App\Http\Controllers\Backend\WorksController@new')->name('admin.work.new');
        Route::get('/edit/{id}', 'App\Http\Controllers\Backend\WorksController@edit')->name('admin.work.edit');
        Route::post('/update', 'App\Http\Controllers\Backend\WorksController@update')->name('admin.work.update');
        Route::post('/clone', 'App\Http\Controllers\Backend\WorksController@clone_new_draft')->name('admin.work.clone');
        Route::post('/bulk-action', 'App\Http\Controllers\Backend\WorksController@bulk_action')->name('admin.work.bulk.action');
        Route::post('/delete/{id}', 'App\Http\Controllers\Backend\WorksController@delete')->name('admin.work.delete');
        Route::post('/cat-by-slug', 'App\Http\Controllers\Backend\WorksController@category_by_slug')->name('admin.work.category.by.slug');
        Route::post('/slug-check', 'App\Http\Controllers\Backend\WorksController@slug_check')->name('admin.work.slug.check');

        /*----------------------------------------------------
             CASE STUDY : CATEGORY ROUTES
        ----------------------------------------------------*/
        Route::group(['prefix' => 'category'], function () {
            Route::get('/', 'App\Http\Controllers\Backend\WorksController@category_index')->name('admin.work.category');
            Route::post('/', 'App\Http\Controllers\Backend\WorksController@category_store');
            Route::post('/update', 'App\Http\Controllers\Backend\WorksController@category_update')->name('admin.work.category.update');
            Route::post('/delete/{id}', 'App\Http\Controllers\Backend\WorksController@category_delete')->name('admin.work.category.delete');
            Route::post('/bulk-action', 'App\Http\Controllers\Backend\WorksController@category_bulk_action')->name('admin.work.category.bulk.action');
        });
    });

    /*==============================================
          FRONTEND USER MANAGE
    ==============================================*/
    Route::prefix('frontend/user')->middleware(['adminPermissionCheck:Users Manage'])->group(function () {
        Route::get('/new', 'App\Http\Controllers\Backend\FrontendUserManageController@new_user')->name('admin.frontend.new.user');
        Route::post('/new', 'App\Http\Controllers\Backend\FrontendUserManageController@new_user_add');
        Route::post('/update', 'App\Http\Controllers\Backend\FrontendUserManageController@user_update')->name('admin.frontend.user.update');
        Route::post('/password-change', 'App\Http\Controllers\Backend\FrontendUserManageController@user_password_change')->name('admin.frontend.user.password.change');
        Route::post('/delete/{id}', 'App\Http\Controllers\Backend\FrontendUserManageController@new_user_delete')->name('admin.frontend.delete.user');
        Route::get('/all', 'App\Http\Controllers\Backend\FrontendUserManageController@all_user')->name('admin.all.frontend.user');
        Route::post('/all/bulk-action', 'App\Http\Controllers\Backend\FrontendUserManageController@bulk_action')->name('admin.all.frontend.user.bulk.action');
        Route::post('/all/email-status', 'App\Http\Controllers\Backend\FrontendUserManageController@email_status')->name('admin.all.frontend.user.email.status');
    });

    /*==============================================
         ADMIN ROLE MANAGE MANAGE
    ==============================================*/
    Route::prefix('admin')->middleware(['adminPermissionCheck:Admin Manage'])->group(function () {
        /*----------------------------------------------------
            ADMIN MANAGE
         ----------------------------------------------------*/
        Route::get('/new', 'App\Http\Controllers\Backend\UserRoleManageController@new_user')->name('admin.new.user');
        Route::post('/new', 'App\Http\Controllers\Backend\UserRoleManageController@new_user_add');
        Route::post('/update', 'App\Http\Controllers\Backend\UserRoleManageController@user_update')->name('admin.user.update');
        Route::post('/password-change', 'App\Http\Controllers\Backend\UserRoleManageController@user_password_change')->name('admin.user.password.change');
        Route::post('/delete/{id}', 'App\Http\Controllers\Backend\UserRoleManageController@new_user_delete')->name('admin.delete.user');
        Route::get('/all', 'App\Http\Controllers\Backend\UserRoleManageController@all_user')->name('admin.all.user');
        /*----------------------------------------------------
          ADMIN ROLE MANAGE
        ----------------------------------------------------*/
        Route::group(['prefix' => 'all/role'], function () {
            Route::get('/', 'App\Http\Controllers\Backend\UserRoleManageController@all_user_role')->name('admin.all.user.role');
            Route::post('/', 'App\Http\Controllers\Backend\UserRoleManageController@add_new_user_role');
            Route::post('/update', 'App\Http\Controllers\Backend\UserRoleManageController@udpate_user_role')->name('admin.user.role.edit');
            Route::post('/delete/{id}', 'App\Http\Controllers\Backend\UserRoleManageController@delete_user_role')->name('admin.user.role.delete');
        });
    });

    /*==============================================
        GENERAL SETTINGS ROUTES
     ==============================================*/

    Route::prefix('general-settings')->middleware(['adminPermissionCheck:General Settings'])->group(function () {
        /*----------------------------------------------------
              SITE IDENTITY
        ----------------------------------------------------*/
        Route::get('/site-identity', 'App\Http\Controllers\Backend\GeneralSettingsController@site_identity')->name('admin.general.site.identity');
        Route::post('/site-identity', 'App\Http\Controllers\Backend\GeneralSettingsController@update_site_identity');


        /*----------------------------------------------------
            BASIC SETTINGS
        ----------------------------------------------------*/
        Route::get('/basic-settings', 'App\Http\Controllers\Backend\GeneralSettingsController@basic_settings')->name('admin.general.basic.settings');
        Route::post('/basic-settings', 'App\Http\Controllers\Backend\GeneralSettingsController@update_basic_settings');

        /*----------------------------------------------------
          EMAIL TEMPLATE SETTINGS
        ----------------------------------------------------*/
        Route::get('/email-template', 'App\Http\Controllers\Backend\GeneralSettingsController@email_template_settings')->name('admin.general.email.template');
        Route::post('/email-template', 'App\Http\Controllers\Backend\GeneralSettingsController@update_email_template_settings');

        /*----------------------------------------------------
          EMAIL  SETTINGS
         ----------------------------------------------------*/
        Route::get('/email-settings', 'App\Http\Controllers\Backend\GeneralSettingsController@email_settings')->name('admin.general.email.settings');
        Route::post('/email-settings', 'App\Http\Controllers\Backend\GeneralSettingsController@update_email_settings');

        /*----------------------------------------------------
          SMTP SETTINGS
         ----------------------------------------------------*/
        Route::get('/smtp-settings', 'App\Http\Controllers\Backend\GeneralSettingsController@smtp_settings')->name('admin.general.smtp.settings');
        Route::post('/smtp-settings', 'App\Http\Controllers\Backend\GeneralSettingsController@update_smtp_settings');
        Route::post('/smtp-settings/test', 'App\Http\Controllers\Backend\GeneralSettingsController@test_smtp_settings')->name('admin.general.smtp.settings.test');
    });
});


/* ============================================
    ALL ADMIN PANEL ROUTES : OPEN FOR DEMO
============================================= */
Route::prefix('admin-home')->group(function () {
    Route::post('/media-upload/all', 'App\Http\Controllers\Backend\MediaUploadController@all_upload_media_file')->name('admin.upload.media.file.all');
    Route::post('/media-upload', 'App\Http\Controllers\Backend\MediaUploadController@upload_media_file')->name('admin.upload.media.file');
    Route::post('/media-upload/loadmore', 'App\Http\Controllers\Backend\MediaUploadController@get_image_for_loadmore')->name('admin.upload.media.file.loadmore');
});