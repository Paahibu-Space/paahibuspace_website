<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Backend\AdminDashboardController;
use Illuminate\Support\Facades\Route;

/*=======================================================
******************** FRONTEND ROUTES **********************
=======================================================*/

Route::get('/', 'App\Http\Controllers\Frontend\FrontendController@index')->name('homepage');
Route::get('/about', 'App\Http\Controllers\Frontend\FrontendController@showAboutPage')->name('frontend.about');
Route::get('/programs', 'App\Http\Controllers\Frontend\FrontendController@showProgramsPage')->name('frontend.programs');
Route::get('/team', 'App\Http\Controllers\Frontend\FrontendController@showTeamPage')->name('frontend.team');
Route::get('/volunteers', 'App\Http\Controllers\Frontend\FrontendController@showVolunteersPage')->name('frontend.volunteers');

// Static Pages
$blog_page_slug = 'blog';
$stories_page_slug = 'stories';
$service_page_slug = 'service';
$work_page_slug = 'work';


    /*--------------------------------------
        FRONTEND: BLOGS ROUTES
    ---------------------------------------*/
    Route::get($blog_page_slug, 'App\Http\Controllers\Frontend\FrontendController@blog_page')->name('frontend.blog');
    Route::get( $blog_page_slug.'/{slug}', 'App\Http\Controllers\Frontend\FrontendController@blog_single_page')->name('frontend.blog.single');
    Route::get( $blog_page_slug.'-search', 'App\Http\Controllers\Frontend\FrontendController@blog_search_page')->name('frontend.blog.search');
    Route::get( $blog_page_slug.'-category/{id}/{any}', 'App\Http\Controllers\Frontend\FrontendController@category_wise_blog_page')->name('frontend.blog.category');
    Route::get( $blog_page_slug.'-tags/{name}', 'App\Http\Controllers\Frontend\FrontendController@tags_wise_blog_page')->name('frontend.blog.tags.page');

    /*--------------------------------------
        FRONTEND: STORIES ROUTES
    ---------------------------------------*/
    Route::get($stories_page_slug, 'App\Http\Controllers\Frontend\FrontendController@story_page')->name('frontend.stories');
    Route::get( $stories_page_slug.'/{slug}', 'App\Http\Controllers\Frontend\FrontendController@story_single_page')->name('frontend.story.single');

    /*--------------------------------------
        FRONTEND: SERVICES ROUTES
    ---------------------------------------*/
    Route::get($service_page_slug, 'App\Http\Controllers\Frontend\FrontendController@service_page')->name('frontend.service');
    Route::get($service_page_slug.'/category/{id}/{any?}', 'App\Http\Controllers\Frontend\FrontendController@category_wise_services_page')->name('frontend.services.category');
    Route::get( $service_page_slug.'/{slug}', 'App\Http\Controllers\Frontend\FrontendController@services_single_page')->name('frontend.services.single');

    /*----------------------------------------
      FRONTEND: CUSTOM FORM BUILDER ROUTES
    -----------------------------------------*/
    Route::post('submit-custom-form', 'App\Http\Controllers\Frontend\FrontendFormController@custom_form_builder_message')->name('frontend.form.builder.custom.submit');

    /*==============================================
    FRONTEND ROUTES: PROGRAM MODULE
==============================================*/
Route::group(['middleware' => ['maintains_mode']], function () {

    $programs_page_slug = 'programs';
    //programs
    Route::get($programs_page_slug , 'App\Http\Controllers\Frontend\FrontendController@programs')->name('frontend.programs');
    Route::get($programs_page_slug.'/{slug}', 'App\Http\Controllers\Frontend\FrontendController@programs_single')->name('frontend.programs.single');
    Route::get($programs_page_slug.'-category/{id}/{any?}', 'App\Http\Controllers\FrontendController@programs_category')->name('frontend.programs.category');
    Route::get($programs_page_slug.'-search', 'App\Http\Controllers\Frontend\FrontendController@programs_search')->name('frontend.programs.search');
    Route::get($programs_page_slug.'-registration/{id}', 'App\Http\Controllers\Frontend\FrontendController@program_registration')->name('frontend.program.registration');
    Route::post($programs_page_slug.'-registration', 'App\Http\Controllers\Frontend\FrontendFormController@store_program_registration_data')->name('frontend.program.registration.store');

    //program registration
    Route::get('/registration-confirm/{id}', 'App\Http\Controllers\Frontend\FrontendController@registration_confirm')->name('frontend.program.registration.confirm');
    Route::post('/registration-confirm', 'ProgramPaymentLogsController@registration_payment_form')->name('frontend.program.payment.confirm');
    Route::get('/registration-success/{id}', 'App\Http\Controllers\Frontend\FrontendController@program_payment_success')->name('frontend.program.payment.success');
    Route::get('/registration-cancel/{id}', 'App\Http\Controllers\Frontend\FrontendController@program_payment_cancel')->name('frontend.program.payment.cancel');
});

    /*--------------------------------------
         FRONTEND: CASE STUDY/ WORKS ROUTES
     ---------------------------------------*/
     Route::get($work_page_slug, 'FrontendController@work_page')->name('frontend.work');
     Route::get( $work_page_slug.'/{slug}', 'FrontendController@work_single_page')->name('frontend.work.single');
     Route::get( $work_page_slug.'/category/{id}/{any?}', 'FrontendController@category_wise_works_page')->name('frontend.works.category');

     // Frontend Newsletter Subscription
     Route::post('/subscribe-newsletter', 'App\Http\Controllers\Frontend\FrontendController@subscribe_newsletter')->name('frontend.subscribe.newsletter');

    //  Get in touch
     Route::post('/get-touch', 'App\Http\Controllers\Frontend\FrontendFormController@get_touch')->name('frontend.get.touch');


    //user login
    Route::get('/login', 'Auth\LoginController@showLoginForm')->name('user.login');
    Route::post('/ajax-login', 'FrontendController@ajax_login')->name('user.ajax.login');
    Route::post('/login', 'Auth\LoginController@login');
    Route::get('/register', 'Auth\RegisterController@showRegistrationForm')->name('user.register');
    Route::post('/register', 'Auth\RegisterController@register');
    Route::get('/login/forget-password', 'FrontendController@showUserForgetPasswordForm')->name('user.forget.password');
    Route::get('/login/reset-password/{user}/{token}', 'FrontendController@showUserResetPasswordForm')->name('user.reset.password');
    Route::post('/login/reset-password', 'FrontendController@UserResetPassword')->name('user.reset.password.change');
    Route::post('/login/forget-password', 'FrontendController@sendUserForgetPasswordMail');
    Route::post('/logout', 'Auth\LoginController@logout')->name('user.logout');
    //user email verify
    Route::get('/user/email-verify', 'UserDashboardController@user_email_verify_index')->name('user.email.verify');
    Route::get('/user/resend-verify-code', 'UserDashboardController@reset_user_email_verify_code')->name('user.resend.verify.mail');
    Route::post('/user/email-verify', 'UserDashboardController@user_email_verify');

    Route::post('/request-quote', 'FrontendFormController@send_quote_message')->name('frontend.quote.message');
    Route::post('/request-estimate', 'FrontendFormController@send_estimate_message')->name('frontend.estimate.message');
    Route::get('/home/{id}', 'FrontendController@home_page_change')->name('frontend.homepage.demo');

    
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
    Route::prefix('knowledge')->middleware(['adminPermissionCheck:Knowledgebase'])->group(function () {

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
        Route::get('/', 'VideoGalleryController@index')->name('admin.video.gallery.all');
        Route::post('/new', 'VideoGalleryController@store')->name('admin.video.gallery.new');
        Route::post('/update', 'VideoGalleryController@update')->name('admin.video.gallery.update');
        Route::post('/delete/{id}', 'VideoGalleryController@delete')->name('admin.video.gallery.delete');
        Route::post('/bulk-action', 'VideoGalleryController@bulk_action')->name('admin.video.gallery.bulk.action');
        Route::get('/page-settings', 'VideoGalleryController@page_settings')->name('admin.video.gallery.page.settings');
        Route::post('/page-settings', 'VideoGalleryController@update_page_settings');
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
            PROGRAM EMAIL TEMPLATE ROUTE
        ==========================================*/

        /* program order mail admin */
        Route::get('/program-registration-mail-admin', 'App\Http\Controllers\Backend\EmailTemplateController@program_registration_mail_admin')->name('admin.email.template.program.registration.mail.admin');
        Route::post('/program-registration-mail-admin', 'App\Http\Controllers\Backend\EmailTemplateController@update_program_registration_mail_admin');

        /* program registration mail user */
        Route::get('/program-registration-mail-user', 'App\Http\Controllers\Backend\EmailTemplateController@program_registration_mail_user')->name('admin.email.template.program.registration.mail.user');
        Route::post('/program-registration-mail-user', 'App\Http\Controllers\Backend\EmailTemplateController@update_program_registration_mail_user');

        /* program registration reminder mail */
        Route::get('/program-registration-mail-reminder-mail', 'App\Http\Controllers\Backend\EmailTemplateController@program_registration_mail_reminder_mail')->name('admin.email.template.program.registration.mail.reminder.mail');
        Route::post('/program-registration-mail-reminder-mail', 'App\Http\Controllers\Backend\EmailTemplateController@update_program_registration_mail_reminder_mail');
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
       PARTNERS ANS SUPPORTERS ROUTES
    ==============================================*/
    Route::prefix('partners')->middleware(['adminPermissionCheck:Partners Manage'])->group(function () {
        //partner logos
        Route::get('/', 'App\Http\Controllers\Backend\PartnersController@index')->name('admin.partners');
        Route::post('/', 'App\Http\Controllers\Backend\PartnersController@store');
        Route::post('/update', 'App\Http\Controllers\Backend\PartnersController@update')->name('admin.partners.update');
        Route::post('/delete/{id}', 'App\Http\Controllers\Backend\PartnersController@delete')->name('admin.partners.delete');
        Route::post('/bulk-action', 'App\Http\Controllers\Backend\PartnersController@bulk_action')->name('admin.partners.bulk.action');
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
           PROGRAMS MODULE ROUTES
     ==============================================*/
    Route::prefix('programs')->middleware(['adminPermissionCheck:Programs Manage'])->group(function () {

        /*----------------------------------------
            PROGRAMS MODULE: ROUTEs
        ----------------------------------------*/
        Route::get('/all', 'App\Http\Controllers\Backend\ProgramsController@all_programs')->name('admin.programs.all');
        Route::get('/new', 'App\Http\Controllers\Backend\ProgramsController@new_program')->name('admin.programs.new');
        Route::post('/new', 'App\Http\Controllers\Backend\ProgramsController@store_program');
        Route::get('/edit/{id}', 'App\Http\Controllers\Backend\ProgramsController@edit_program')->name('admin.programs.edit');
        Route::post('/update', 'App\Http\Controllers\Backend\ProgramsController@update_program')->name('admin.programs.update');
        Route::post('/delete/{id}', 'App\Http\Controllers\Backend\ProgramsController@delete_program')->name('admin.programs.delete');
        Route::post('/clone', 'App\Http\Controllers\Backend\ProgramsController@clone_program')->name('admin.programs.clone');
        Route::post('/bulk-action', 'App\Http\Controllers\Backend\ProgramsController@bulk_action')->name('admin.programs.bulk.action');
        Route::post('/slug-check', 'App\Http\Controllers\Backend\ProgramsController@slug_check')->name('admin.programs.slug.check');

        /*----------------------------------------
         REGISTRATION MODULE: REGISTRATION SETTINGS
       ----------------------------------------*/
        //program registration logs
        Route::group(['prefix' => 'registration'], function () {
            Route::get('/all', 'App\Http\Controllers\Backend\ProgramsController@program_registration_logs')->name('admin.program.registration.logs');
            Route::post('/all', 'App\Http\Controllers\Backend\ProgramsController@update_program_registration_logs_status');
            Route::post('/delete/{id}', 'App\Http\Controllers\Backend\ProgramsController@delete_program_registration_logs')->name('admin.program.registration.logs.delete');
            Route::post('/send-mail', 'App\Http\Controllers\Backend\ProgramsController@send_mail_program_registration_logs')->name('admin.program.registration.send.mail');
            Route::post('/bulk-action', 'App\Http\Controllers\Backend\ProgramsController@registration_logs_bulk_action')->name('admin.program.registration.bulk.action');
        });

        /*----------------------------------------
        PROGRAMS MODULE: OTHERS ROUTES
        ----------------------------------------*/
        Route::post('/program-registration/reminder', 'App\Http\Controllers\Backend\ProgramsController@program_registration_reminder')->name('admin.program.registration.reminder');
        Route::get('/registration/report', 'App\Http\Controllers\Backend\ProgramsController@registration_report')->name('admin.program.registration.report');
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
          SEO SETTINGS
        ----------------------------------------------------*/
        Route::get('/seo-settings', 'App\Http\Controllers\Backend\GeneralSettingsController@seo_settings')->name('admin.general.seo.settings');
        Route::post('/seo-settings', 'App\Http\Controllers\Backend\GeneralSettingsController@update_seo_settings');

        /*----------------------------------------------------
         PAGE SETTINGS
        ----------------------------------------------------*/
        Route::get('/page-settings', 'App\Http\Controllers\Backend\GeneralSettingsController@page_settings')->name('admin.general.page.settings');
        Route::post('/page-settings', 'App\Http\Controllers\Backend\GeneralSettingsController@update_page_settings');

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