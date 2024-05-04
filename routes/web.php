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


Route::get('/dashboard', function () {
    return view('dashboard');
})->name('admin.dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


/*--------------------------------------
    ADMIN LOGIN ROUTES
------------------------------------- */
Route::prefix('admin-home')->group(function () {
    Route::get('/', [AdminDashboardController::class, 'adminIndex'])->name('admin.home');
});

Route::get('/', 'AdminDashboardController@adminIndex')->name('admin.home');

/* --------------------------
        MAINTAINS PAGE
    -------------------------- */
Route::get('/maintains-page/settings', 'MaintainsPageController@maintains_page_settings')->name('admin.maintains.page.settings');
Route::post('/maintains-page/settings', 'MaintainsPageController@update_maintains_page_settings');


/*---------------------------
        ADMIN SETTINGS
    ----------------------------*/
Route::get('/settings', 'AdminDashboardController@admin_settings')->name('admin.profile.settings');
Route::get('/profile-update', 'AdminDashboardController@admin_profile')->name('admin.profile.update');
Route::post('/profile-update', 'AdminDashboardController@admin_profile_update');
Route::get('/password-change', 'AdminDashboardController@admin_password')->name('admin.password.change');
Route::post('/password-change', 'AdminDashboardController@admin_password_chagne');
Route::post('/set-static-option', 'AdminDashboardController@admin_set_static_option');
Route::post('/get-static-option', 'AdminDashboardController@admin_get_static_option');
Route::post('/update-static-option', 'AdminDashboardController@admin_update_static_option');
require __DIR__ . '/auth.php';

/*-----------------------------------
          KNOWLEDGEBASE ROUTES
    ------------------------------------*/
Route::prefix('knowledge')->middleware(['adminPermissionCheck:Knowledgebase', 'moduleCheck:knowledgebase_module_status'])->group(function () {

    Route::get('/', 'KnowledgebaseController@all_knowledgebases')->name('admin.knowledge.all');
    Route::get('/new', 'KnowledgebaseController@new_knowledgebase')->name('admin.knowledge.new');
    Route::post('/new', 'KnowledgebaseController@store_knowledgebases');
    Route::get('/edit/{id}', 'KnowledgebaseController@edit_knowledgebases')->name('admin.knowledge.edit');
    Route::post('/update', 'KnowledgebaseController@update_knowledgebases')->name('admin.knowledge.update');
    Route::post('/delete/{id}', 'KnowledgebaseController@delete_knowledgebases')->name('admin.knowledge.delete');
    Route::post('/clone', 'KnowledgebaseController@clone_knowledgebases')->name('admin.knowledge.clone');
    Route::post('/bulk-action', 'KnowledgebaseController@bulk_action')->name('admin.knowledge.bulk.action');
    Route::post('/slug-check', 'KnowledgebaseController@slug_check')->name('admin.knowledge.slug.check');

    /*-----------------------------------
         KNOWLEDGEBASE: CATEGORY ROUTES
       ------------------------------------*/
    Route::group(['prefix' => 'category'], function () {
        Route::get('/', 'KnowledgebaseTopicsController@all_knowledgebase_category')->name('admin.knowledge.category.all');
        Route::post('/new', 'KnowledgebaseTopicsController@store_knowledgebase_category')->name('admin.knowledge.category.new');
        Route::post('/update', 'KnowledgebaseTopicsController@update_knowledgebase_category')->name('admin.knowledge.category.update');
        Route::post('/delete/{id}', 'KnowledgebaseTopicsController@delete_knowledgebase_category')->name('admin.knowledge.category.delete');
        Route::post('/lang', 'KnowledgebaseTopicsController@category_by_language_slug')->name('admin.knowledge.category.by.lang');
        Route::post('/bulk-action', 'KnowledgebaseTopicsController@bulk_action')->name('admin.knowledge.category.bulk.action');
    });
});

/*==============================================
          SERVICES MODULE
    ==============================================*/
Route::prefix('services')->middleware(['adminPermissionCheck:Services'])->group(function () {
    /*-----------------------------------
         SERVICES MODULE : SERVICES ROUTES
        ------------------------------------*/
    Route::get('/', 'ServiceController@index')->name('admin.services');
    Route::post('/', 'ServiceController@store');
    Route::get('/new', 'ServiceController@new_service')->name('admin.services.new');
    Route::get('/edit/{id}', 'ServiceController@edit_service')->name('admin.services.edit');
    Route::post('/cat-by-slug', 'ServiceController@category_by_slug')->name('admin.service.category.by.slug');
    Route::post('/price-plan-by-slug', 'ServiceController@price_plan_by_slug')->name('admin.service.price.plan.by.slug');
    Route::post('/update', 'ServiceController@update')->name('admin.services.update');
    Route::post('/clone', 'ServiceController@clone_service_as_draft')->name('admin.services.clone');
    Route::post('/bulk-action', 'ServiceController@bulk_action')->name('admin.services.bulk.action');
    Route::post('/delete/{id}', 'ServiceController@delete')->name('admin.services.delete');
    Route::post('/slug-check', 'ServiceController@slug_check')->name('admin.services.slug.check');
    /*-----------------------------------
            SERVICES MODULE : CATEGORY ROUTES
         ------------------------------------*/
    Route::group(['prefix' => 'category'], function () {
        Route::get('/', 'ServiceController@category_index')->name('admin.service.category');
        Route::post('/', 'ServiceController@category_store');
        Route::post('/update', 'ServiceController@category_update')->name('admin.service.category.update');
        Route::post('/delete/{id}', 'ServiceController@category_delete')->name('admin.service.category.delete');
        Route::post('/bulk-action', 'ServiceController@category_bulk_action')->name('admin.service.category.bulk.action');
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
    Route::get('/', 'TeamMemberController@index')->name('admin.team.member');
    Route::post('/', 'TeamMemberController@store');
    Route::post('/update', 'TeamMemberController@update')->name('admin.team.member.update');
    Route::post('/delete/{id}', 'TeamMemberController@delete')->name('admin.team.member.delete');
    Route::post('/bulk-action', 'TeamMemberController@bulk_action')->name('admin.team.member.bulk.action');
});

/*==============================================
        TEAM MEMBER PAGE ROUTES
    ==============================================*/
Route::prefix('team-member')->middleware(['adminPermissionCheck:Team Members'])->group(function () {
    //team member
    Route::get('/', 'TeamMemberController@index')->name('admin.team.member');
    Route::post('/', 'TeamMemberController@store');
    Route::post('/update', 'TeamMemberController@update')->name('admin.team.member.update');
    Route::post('/delete/{id}', 'TeamMemberController@delete')->name('admin.team.member.delete');
    Route::post('/bulk-action', 'TeamMemberController@bulk_action')->name('admin.team.member.bulk.action');
});

/*======================================
        EMAIL TEMPLATE SETTINGS
    =======================================*/
Route::prefix('email-template')->middleware(['auth:admin', 'adminPermissionCheck:Email Templates'])->namespace('Admin')->group(function () {
    Route::get('/all', 'EmailTemplateController@all')->name('admin.email.template.all');

    /*-------------------------------------------
            ADMIN PASSWORD RESET ROUTES
        ---------------------------------------------*/
    Route::get('/admin-password-reset', 'EmailTemplateController@admin_password_reset')->name('admin.email.template.admin.password.reset');
    Route::post('/admin-password-reset', 'EmailTemplateController@update_admin_password_reset');

    /*-------------------------------------------
          USER PASSWORD RESET ROUTES
        ---------------------------------------------*/
    Route::get('/user-password-reset', 'EmailTemplateController@user_password_reset')->name('admin.email.template.user.password.reset');
    Route::post('/user-password-reset', 'EmailTemplateController@update_user_password_reset');

    /*-------------------------------------------
         USER EMAIL VERIFY ROUTES
        ---------------------------------------------*/
    Route::get('/user-email-verify', 'EmailTemplateController@user_email_verify')->name('admin.email.template.user.email.verify');
    Route::post('/user-email-verify', 'EmailTemplateController@update_user_email_verify');

    /*-------------------------------------------
            NEWSLETTER VERIFY ROUTES
        ---------------------------------------------*/
    Route::get('/newsletter-verify', 'EmailTemplateController@newsletter_verify')->name('admin.email.template.newsletter.verify');
    Route::post('/newsletter-verify', 'EmailTemplateController@update_newsletter_verify');

    /*==========================================
            EVENT EMAIL TEMPLATE ROUTE
        ==========================================*/

    /* event order mail admin */
    Route::get('/event-attendance-mail-admin', 'EventEmailTemplateController@event_attendance_mail_admin')->name('admin.email.template.event.attendance.mail.admin');
    Route::post('/event-attendance-mail-admin', 'EventEmailTemplateController@update_event_attendance_mail_admin');

    /* event order mail user */
    Route::get('/event-attendance-mail-user', 'EventEmailTemplateController@event_attendance_mail_user')->name('admin.email.template.event.attendance.mail.user');
    Route::post('/event-attendance-mail-user', 'EventEmailTemplateController@update_event_attendance_mail_user');
    /* event order payment accept */
    Route::get('/event-attendance-mail-payment-accept', 'EventEmailTemplateController@event_attendance_mail_payment_accept')->name('admin.email.template.event.attendance.mail.payment.accept');
    Route::post('/event-attendance-mail-payment-accept', 'EventEmailTemplateController@update_event_attendance_mail_payment_accept');

    /* event order reminder mail */
    Route::get('/event-attendance-mail-reminder-mail', 'EventEmailTemplateController@event_attendance_mail_reminder_mail')->name('admin.email.template.event.attendance.mail.reminder.mail');
    Route::post('/event-attendance-mail-reminder-mail', 'EventEmailTemplateController@update_event_attendance_mail_reminder_mail');
});

/*==============================================
         NEWSLETTER ROUTES
     ==============================================*/
Route::prefix('newsletter')->middleware(['adminPermissionCheck:Newsletter Manage'])->group(function () {
    Route::get('/', 'NewsletterController@index')->name('admin.newsletter');
    Route::post('/delete/{id}', 'NewsletterController@delete')->name('admin.newsletter.delete');
    Route::post('/single', 'NewsletterController@send_mail')->name('admin.newsletter.single.mail');
    Route::get('/all', 'NewsletterController@send_mail_all_index')->name('admin.newsletter.mail');
    Route::post('/all', 'NewsletterController@send_mail_all');
    Route::post('/new', 'NewsletterController@add_new_sub')->name('admin.newsletter.new.add');
    Route::post('/bulk-action', 'NewsletterController@bulk_action')->name('admin.newsletter.bulk.action');
    Route::post('/verify-mail-send', 'NewsletterController@verify_mail_send')->name('admin.newsletter.verify.mail.send');
});

/*==============================================
            MEDIA UPLOAD ROUTES
     ==============================================*/
Route::prefix('media-upload')->group(function () {
    Route::post('/delete', 'MediaUploadController@delete_upload_media_file')->name('admin.upload.media.file.delete');
    Route::get('/page', 'MediaUploadController@all_upload_media_images_for_page')->name('admin.upload.media.images.page');
    Route::post('/alt', 'MediaUploadController@alt_change_upload_media_file')->name('admin.upload.media.file.alt.change');
});

/*==============================================
       BLOGS
    ==============================================*/
Route::prefix('blog')->middleware(['adminPermissionCheck:Blogs Manage'])->group(function () {
    /*-------------------------
          BLOG ROUTES
        --------------------------*/
    Route::get('/', 'BlogController@index')->name('admin.blog');
    Route::get('/new', 'BlogController@new_blog')->name('admin.blog.new');
    Route::post('/new', 'BlogController@store_new_blog');
    Route::post('/clone', 'BlogController@clone_blog')->name('admin.blog.clone');
    Route::get('/edit/{id}', 'BlogController@edit_blog')->name('admin.blog.edit');
    Route::post('/update/{id}', 'BlogController@update_blog')->name('admin.blog.update');
    Route::post('/delete/{id}', 'BlogController@delete_blog')->name('admin.blog.delete');
    Route::post('/bulk-action', 'BlogController@bulk_action')->name('admin.blog.bulk.action');
    Route::post('/slug-check', 'BlogController@slug_check')->name('admin.blog.slug.check');

    /*-------------------------
          BLOG CATEGORIES ROUTES
        --------------------------*/
    Route::group(['prefix' => 'category'], function () {
        Route::get('/', 'BlogController@category')->name('admin.blog.category');
        Route::post('/', 'BlogController@new_category');
        Route::post('/delete/{id}', 'BlogController@delete_category')->name('admin.blog.category.delete');
        Route::post('/update', 'BlogController@update_category')->name('admin.blog.category.update');
        Route::post('/bulk-action', 'BlogController@category_bulk_action')->name('admin.blog.category.bulk.action');
    });


    Route::post('/blog-lang-by-cat', 'BlogController@Language_by_slug')->name('admin.blog.lang.cat');
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
    Route::get('/', 'TestimonialController@index')->name('admin.testimonial');
    Route::post('/', 'TestimonialController@store');
    Route::post('/clone', 'TestimonialController@clone')->name('admin.testimonial.clone');
    Route::post('/update', 'TestimonialController@update')->name('admin.testimonial.update');
    Route::post('/delete/{id}', 'TestimonialController@delete')->name('admin.testimonial.delete');
    Route::post('/bulk-action', 'TestimonialController@bulk_action')->name('admin.testimonial.bulk.action');
});

/*==============================================
           EVENTS MODULE ROUTES
     ==============================================*/
Route::prefix('events')->middleware(['adminPermissionCheck:Events Manage', 'moduleCheck:events_module_status'])->group(function () {

    /*----------------------------------------
            EVENTS MODULE: ROUTEs
        ----------------------------------------*/
    Route::get('/all', 'EventsController@all_events')->name('admin.events.all');
    Route::get('/new', 'EventsController@new_event')->name('admin.events.new');
    Route::post('/new', 'EventsController@store_event');
    Route::get('/edit/{id}', 'EventsController@edit_event')->name('admin.events.edit');
    Route::post('/update', 'EventsController@update_event')->name('admin.events.update');
    Route::post('/delete/{id}', 'EventsController@delete_event')->name('admin.events.delete');
    Route::post('/clone', 'EventsController@clone_event')->name('admin.events.clone');
    Route::post('/bulk-action', 'EventsController@bulk_action')->name('admin.events.bulk.action');
    Route::post('/slug-check', 'EventsController@slug_check')->name('admin.events.slug.check');
    /*----------------------------------------
            EVENTS MODULE: SUCCESS PAGE SETTINGS
        ----------------------------------------*/

    Route::get('/payment-success-page-settings', 'EventsController@payment_success_page_settings')->name('admin.events.payment.success.page.settings');
    Route::post('/payment-success-page-settings', 'EventsController@update_payment_success_page_settings');

    /*----------------------------------------
         EVENTS MODULE: ATTENDANCE SETTINGS
       ----------------------------------------*/
    //event attendance logs
    Route::group(['prefix' => 'attendance'], function () {
        Route::get('/all', 'EventsController@event_attendance_logs')->name('admin.event.attendance.logs');
        Route::post('/all', 'EventsController@update_event_attendance_logs_status');
        Route::post('/delete/{id}', 'EventsController@delete_event_attendance_logs')->name('admin.event.attendance.logs.delete');
        Route::post('/send-mail', 'EventsController@send_mail_event_attendance_logs')->name('admin.event.attendance.send.mail');
        Route::post('/bulk-action', 'EventsController@attendance_logs_bulk_action')->name('admin.event.attendance.bulk.action');
    });

    /*----------------------------------------
        EVENTS MODULE: CATEGORY ROUTES
         ----------------------------------------*/
    Route::group(['prefix' => 'category'], function () {
        //event category
        Route::get('/', 'EventsCategoryController@all_events_category')->name('admin.events.category.all');
        Route::post('/new', 'EventsCategoryController@store_events_category')->name('admin.events.category.new');
        Route::post('/update', 'EventsCategoryController@update_events_category')->name('admin.events.category.update');
        Route::post('/delete/{id}', 'EventsCategoryController@delete_events_category')->name('admin.events.category.delete');
        Route::post('/lang', 'EventsCategoryController@Category_by_language_slug')->name('admin.events.category.by.lang');
        Route::post('/bulk-action', 'EventsCategoryController@bulk_action')->name('admin.events.category.bulk.action');
    });

    /*----------------------------------------
        EVENTS MODULE: OTHERS ROUTES
        ----------------------------------------*/
    Route::post('/event-attendance/reminder', 'EventsController@event_attedance_reminder')->name('admin.event.attendance.reminder');
    Route::get('/payment/report', 'EventsController@payment_report')->name('admin.event.payment.report');
    Route::get('/attendance/report', 'EventsController@attendance_report')->name('admin.event.attendance.report');
});

/*==============================================
             CASE STUDY MODULE ROUTES
    ==============================================*/
Route::prefix('works')->middleware(['adminPermissionCheck:Case Study'])->group(function () {

    Route::get('/', 'WorksController@index')->name('admin.work');
    Route::post('/', 'WorksController@store');
    Route::get('/new', 'WorksController@new')->name('admin.work.new');
    Route::get('/edit/{id}', 'WorksController@edit')->name('admin.work.edit');
    Route::post('/update', 'WorksController@update')->name('admin.work.update');
    Route::post('/clone', 'WorksController@clone_new_draft')->name('admin.work.clone');
    Route::post('/bulk-action', 'WorksController@bulk_action')->name('admin.work.bulk.action');
    Route::post('/delete/{id}', 'WorksController@delete')->name('admin.work.delete');
    Route::post('/cat-by-slug', 'WorksController@category_by_slug')->name('admin.work.category.by.slug');
    Route::post('/slug-check', 'WorksController@slug_check')->name('admin.work.slug.check');

    /*----------------------------------------------------
             CASE STUDY : CATEGORY ROUTES
        ----------------------------------------------------*/
    Route::group(['prefix' => 'category'], function () {
        Route::get('/', 'WorksController@category_index')->name('admin.work.category');
        Route::post('/', 'WorksController@category_store');
        Route::post('/update', 'WorksController@category_update')->name('admin.work.category.update');
        Route::post('/delete/{id}', 'WorksController@category_delete')->name('admin.work.category.delete');
        Route::post('/bulk-action', 'WorksController@category_bulk_action')->name('admin.work.category.bulk.action');
    });
});

/*==============================================
          FRONTEND USER MANAGE
    ==============================================*/
Route::prefix('frontend/user')->middleware(['adminPermissionCheck:Users Manage'])->group(function () {
    Route::get('/new', 'FrontendUserManageController@new_user')->name('admin.frontend.new.user');
    Route::post('/new', 'FrontendUserManageController@new_user_add');
    Route::post('/update', 'FrontendUserManageController@user_update')->name('admin.frontend.user.update');
    Route::post('/password-change', 'FrontendUserManageController@user_password_change')->name('admin.frontend.user.password.change');
    Route::post('/delete/{id}', 'FrontendUserManageController@new_user_delete')->name('admin.frontend.delete.user');
    Route::get('/all', 'FrontendUserManageController@all_user')->name('admin.all.frontend.user');
    Route::post('/all/bulk-action', 'FrontendUserManageController@bulk_action')->name('admin.all.frontend.user.bulk.action');
    Route::post('/all/email-status', 'FrontendUserManageController@email_status')->name('admin.all.frontend.user.email.status');
});

/*==============================================
         ADMIN ROLE MANAGE MANAGE
    ==============================================*/
Route::prefix('admin')->middleware(['adminPermissionCheck:Admin Manage'])->group(function () {
    /*----------------------------------------------------
            ADMIN MANAGE
         ----------------------------------------------------*/
    Route::get('/new', 'UserRoleManageController@new_user')->name('admin.new.user');
    Route::post('/new', 'UserRoleManageController@new_user_add');
    Route::post('/update', 'UserRoleManageController@user_update')->name('admin.user.update');
    Route::post('/password-change', 'UserRoleManageController@user_password_change')->name('admin.user.password.change');
    Route::post('/delete/{id}', 'UserRoleManageController@new_user_delete')->name('admin.delete.user');
    Route::get('/all', 'UserRoleManageController@all_user')->name('admin.all.user');
    /*----------------------------------------------------
          ADMIN ROLE MANAGE
        ----------------------------------------------------*/
    Route::group(['prefix' => 'all/role'], function () {
        Route::get('/', 'UserRoleManageController@all_user_role')->name('admin.all.user.role');
        Route::post('/', 'UserRoleManageController@add_new_user_role');
        Route::post('/update', 'UserRoleManageController@udpate_user_role')->name('admin.user.role.edit');
        Route::post('/delete/{id}', 'UserRoleManageController@delete_user_role')->name('admin.user.role.delete');
    });
});

/*==============================================
        GENERAL SETTINGS ROUTES
     ==============================================*/

Route::prefix('general-settings')->middleware(['adminPermissionCheck:General Settings'])->group(function () {
    /*----------------------------------------------------
              SITE IDENTITY
        ----------------------------------------------------*/
    Route::get('/site-identity', 'GeneralSettingsController@site_identity')->name('admin.general.site.identity');
    Route::post('/site-identity', 'GeneralSettingsController@update_site_identity');
});

/*----------------------------------------------------
          EMAIL  SETTINGS
         ----------------------------------------------------*/
Route::get('/email-settings', 'GeneralSettingsController@email_settings')->name('admin.general.email.settings');
Route::post('/email-settings', 'GeneralSettingsController@update_email_settings');

/*----------------------------------------------------
          SMTP SETTINGS
         ----------------------------------------------------*/
Route::get('/smtp-settings', 'GeneralSettingsController@smtp_settings')->name('admin.general.smtp.settings');
Route::post('/smtp-settings', 'GeneralSettingsController@update_smtp_settings');
Route::post('/smtp-settings/test', 'GeneralSettingsController@test_smtp_settings')->name('admin.general.smtp.settings.test');
