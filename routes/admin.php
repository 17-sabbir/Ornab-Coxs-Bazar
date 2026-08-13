<?php

use App\Http\Controllers\Admin\aboutusController;
use App\Http\Controllers\Admin\applicationController;
use App\Http\Controllers\Admin\ChiefMessageController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\DonationCampaignController;
use App\Http\Controllers\Admin\DonationController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\galleryController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\invokedController;
use App\Http\Controllers\Admin\legalAffilationController;
use App\Http\Controllers\Admin\LegalRegistrationController;
use App\Http\Controllers\Admin\messageController;
use App\Http\Controllers\Admin\missionController;
use App\Http\Controllers\Admin\newsController;
use App\Http\Controllers\Admin\partnersController;
use App\Http\Controllers\Admin\PaymentMethodController;
use App\Http\Controllers\Admin\policyController;
use App\Http\Controllers\Admin\ProgramController;
use App\Http\Controllers\Admin\PublicationController;
use App\Http\Controllers\Admin\sliderController;
use App\Http\Controllers\Admin\YoutubeVideoController;
use App\Http\Controllers\Admin\StoryController;
use App\Http\Controllers\Admin\StrategicPlanController;
use App\Http\Controllers\Admin\ProjectListController;
use App\Http\Controllers\Admin\subscribeController;
use App\Http\Controllers\Admin\TeamMemberController;
use App\Http\Controllers\Admin\VolunteerApplicationController;
use App\Http\Controllers\Admin\VolunteerInfoController;
use App\Http\Controllers\Admin\AnnualReportController;
use App\Http\Controllers\Admin\FinancialStatementController;
use App\Http\Controllers\Admin\AuditReportController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\BoardOfDirectorController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'admin'], function () {
    Route::get('/', function () {
        return redirect('/admin/home');
    })->name('admin.root');

    Auth::routes(['register' => false]);
});

Route::get('/admin/home', [HomeController::class, 'index'])->middleware('auth')->name('admin.home');
Route::get('admin/dashboard', [HomeController::class, 'index'])->middleware('auth')->name('admin.dashboard');

// Some auth flows still redirect to /home after login.
// Keep this as a thin shim to the admin dashboard.
Route::get('/home', function () {
    return redirect()->route('admin.home');
})->middleware('auth')->name('home');


Route::prefix('admin')->middleware('auth')->group(function () {
    // slider
    Route::get('/slider/add', [sliderController::class, 'add'])->name('slider.add');
    Route::post('/slider/store', [sliderController::class, 'store'])->name('slider.store');
    Route::get('/slider/all', [sliderController::class, 'index'])->name('slider.index');
    Route::get('/slider/delete/{id}', [sliderController::class, 'destroy'])->name('slider.delete');
    Route::get('/slider/edit/{id}', [sliderController::class, 'edit'])->name('slider.edit');
    Route::post('/slider/update/{id}', [sliderController::class, 'update'])->name('slider.update');

    // Youtube Videos
    Route::get('/youtube/add', [YoutubeVideoController::class, 'add'])->name('youtube.add');
    Route::post('/youtube/store', [YoutubeVideoController::class, 'store'])->name('youtube.store');
    Route::get('/youtube/all', [YoutubeVideoController::class, 'index'])->name('youtube.index');
    Route::get('/youtube/delete/{id}', [YoutubeVideoController::class, 'destroy'])->name('youtube.delete');
    Route::get('/youtube/edit/{id}', [YoutubeVideoController::class, 'edit'])->name('youtube.edit');
    Route::post('/youtube/update/{id}', [YoutubeVideoController::class, 'update'])->name('youtube.update');

    // Latest News
    Route::get('/news/add', [newsController::class, 'add'])->name('news.add');
    Route::post('/news/store', [newsController::class, 'store'])->name('news.store');
    Route::get('/news/index', [newsController::class, 'index'])->name('news.index');
    Route::get('/news/delete/{id}', [newsController::class, 'destroy'])->name('news.delete');
    Route::get('/news/edit/{id}', [newsController::class, 'edit'])->name('news.edit');
    Route::post('/news/update/{id}', [newsController::class, 'update'])->name('news.update');

    // Photo Gallery
    Route::get('/gallery/add', [galleryController::class, 'add'])->name('gallery.add');
    Route::post('/gallery/store', [galleryController::class, 'store'])->name('gallery.store');
    Route::get('/gallery/index', [galleryController::class, 'index'])->name('gallery.index');
    Route::get('/gallery/delete/{id}', [galleryController::class, 'destroy'])->name('gallery.delete');
    Route::get('/gallery/edit/{id}', [galleryController::class, 'edit'])->name('gallery.edit');
    Route::post('/gallery/update/{id}', [galleryController::class, 'update'])->name('gallery.update');
    Route::get('/gallery/albums', [galleryController::class, 'albums'])->name('gallery.albums');

    // Subscribe
    Route::get('admin/subscribe', [subscribeController::class, 'index'])->name('subscribe.all');
    Route::get('admin/subscribe/delete/{id}', [subscribeController::class, 'destroy'])->name('subscribe.delete');

    // Key Focus Area (Dynamic) - Removed
    // Route::get('focus-areas/add', [FocusAreaController::class, 'create'])->name('admin.focus_areas.add');
    // Route::post('focus-areas/store', [FocusAreaController::class, 'store'])->name('admin.focus_areas.store');
    // Route::get('focus-areas/index', [FocusAreaController::class, 'index'])->name('admin.focus_areas.index');
    // Route::get('focus-areas/edit/{id}', [FocusAreaController::class, 'edit'])->name('admin.focus_areas.edit');
    // Route::post('focus-areas/update/{id}', [FocusAreaController::class, 'update'])->name('admin.focus_areas.update');
    // Route::get('focus-areas/delete/{id}', [FocusAreaController::class, 'destroy'])->name('admin.focus_areas.delete');

    // Message
    Route::get('message/index', [messageController::class, 'index'])->name('message.index');
    Route::get('message/delete/{id}', [messageController::class, 'destroy'])->name('message.delete');
    Route::get('message/view/{id}', [messageController::class, 'view'])->name('message.view');
    Route::post('message/reply/{id}', [messageController::class, 'reply'])->name('message.reply');
    Route::post('message/mark-all-read', [messageController::class, 'markAllRead'])->name('message.markAllRead');

    // Contact
    Route::get('contact/add', [ContactController::class, 'add'])->name('contact.add');
    Route::post('contact/store', [ContactController::class, 'store'])->name('contact.store');
    Route::get('contact/index', [ContactController::class, 'index'])->name('contact.index');
    Route::get('contact/edit/{id}', [ContactController::class, 'edit'])->name('contact.edit');
    Route::post('contact/update/{id}', [ContactController::class, 'update'])->name('contact.update');
    Route::get('contact/delete/{id}', [ContactController::class, 'destroy'])->name('contact.delete');

    // __ about us__//
    Route::get('about/us/add', [aboutusController::class, 'create'])->name('about.us.create');
    Route::post('about/us/store', [aboutusController::class, 'store'])->name('about.us.store');
    Route::get('about/us/edit', [aboutusController::class, 'edit'])->name('about.us.edit');
    Route::post('about/us/update', [aboutusController::class, 'update'])->name('about.us.update');

    // __Mission and Vision__//
    Route::get('/mission/vision/create', [missionController::class, 'create'])->name('mission.vision.create');
    Route::post('/mission/vision/store', [missionController::class, 'store'])->name('mission.vision.store');
    Route::get('/mission/vision/edit', [missionController::class, 'edit'])->name('mission.vision.edit');
    Route::post('/mission/vision/update', [missionController::class, 'update'])->name('mission.vision.update');

    // __Origin and Legal Affilation__//
    Route::get('/origin/legal_affilation/create', [legalAffilationController::class, 'create'])->name('origin.legal_affilation.create');
    Route::post('/origin/legal_affilation/store', [legalAffilationController::class, 'store'])->name('origin.legal_affilation.store');
    Route::get('/origin/legal_affilation/index', [legalAffilationController::class, 'index'])->name('origin.legal_affilation.index');
    Route::get('/origin/legal_affilation/delete/{id}', [legalAffilationController::class, 'destroy'])->name('origin.legal_affilation.delete');
    Route::get('/origin/legal_affilation/edit/{id}', [legalAffilationController::class, 'edit'])->name('origin.legal_affilation.edit');
    Route::post('origin/legal_affilation/update/{id}', [legalAffilationController::class, 'update'])->name('origin.legal_affilation.update');

    // __Partner's and Donor's __//
    Route::get('partner/create', [partnersController::class, 'create'])->name('partner.create');
    Route::post('partner/store', [partnersController::class, 'store'])->name('partner.store');
    Route::get('partner/index', [partnersController::class, 'index'])->name('partner.index');
    Route::get('partner/delete/{id}', [partnersController::class, 'destroy'])->name('partner.delete');
    Route::get('partner/edit/{id}', [partnersController::class, 'edit'])->name('partner.edit');
    Route::post('partner/update/{id}', [partnersController::class, 'update'])->name('partner.update');

    // __Policy & Guideline __//
    Route::get('policy/create', [policyController::class, 'create'])->name('policy.create');
    Route::post('policy/store', [policyController::class, 'store'])->name('policy.store');
    Route::get('policy/index', [policyController::class, 'index'])->name('policy.index');
    Route::get('policy/delete/{id}', [policyController::class, 'destroy'])->name('policy.delete');
    Route::get('policy/edit/{id}', [policyController::class, 'edit'])->name('policy.edit');
    Route::post('policy/update/{id}', [policyController::class, 'update'])->name('policy.update');

    // __ Strategic Plan __//
    Route::get('strategic-plans/create', [StrategicPlanController::class, 'create'])->name('strategic_plans.create');
    Route::post('strategic-plans/store', [StrategicPlanController::class, 'store'])->name('strategic_plans.store');
    Route::get('strategic-plans/index', [StrategicPlanController::class, 'index'])->name('strategic_plans.index');
    Route::get('strategic-plans/delete/{id}', [StrategicPlanController::class, 'destroy'])->name('strategic_plans.delete');
    Route::get('strategic-plans/edit/{id}', [StrategicPlanController::class, 'edit'])->name('strategic_plans.edit');
    Route::post('strategic-plans/update/{id}', [StrategicPlanController::class, 'update'])->name('strategic_plans.update');

    // __Publications __//
    Route::get('publications/add', [PublicationController::class, 'add'])->name('publications.add');
    Route::post('publications/store', [PublicationController::class, 'store'])->name('publications.store');
    Route::get('publications/index', [PublicationController::class, 'index'])->name('publications.index');
    Route::get('publications/delete/{id}', [PublicationController::class, 'destroy'])->name('publications.delete');
    Route::get('publications/edit/{id}', [PublicationController::class, 'edit'])->name('publications.edit');
    Route::post('publications/update/{id}', [PublicationController::class, 'update'])->name('publications.update');

    // __Get Invoked __//
    Route::get('invoked/create', [invokedController::class, 'create'])->name('invoked.create');
    Route::post('invoked/store', [invokedController::class, 'store'])->name('invoked.store');
    Route::get('invoked/index', [invokedController::class, 'index'])->name('invoked.index');
    Route::get('invoked/delete/{id}', [invokedController::class, 'destroy'])->name('invoked.delete');
    Route::get('invoked/edit/{id}', [invokedController::class, 'edit'])->name('invoked.edit');
    Route::post('invoked/update/{id}', [invokedController::class, 'update'])->name('invoked.update');

    // __ Applicaiton Logo, Favicon __//
    Route::get('logo/create', [applicationController::class, 'create'])->name('logo.create');
    Route::post('logo/store', [applicationController::class, 'store'])->name('logo.store');
    Route::get('logo/index', [applicationController::class, 'index'])->name('logo.index');
    Route::get('logo/delete/{id}', [applicationController::class, 'destroy'])->name('logo.delete');
    Route::get('logo/edit/{id}', [applicationController::class, 'edit'])->name('logo.edit');
    Route::post('logo/update/{id}', [applicationController::class, 'update'])->name('logo.update');

    // __ Team Members __//
    Route::get('team/add', [TeamMemberController::class, 'add'])->name('team.add');
    Route::post('team/store', [TeamMemberController::class, 'store'])->name('team.store');
    Route::get('team/index', [TeamMemberController::class, 'index'])->name('team.index');
    Route::get('team/delete/{id}', [TeamMemberController::class, 'destroy'])->name('team.delete');
    Route::get('team/edit/{id}', [TeamMemberController::class, 'edit'])->name('team.edit');
    Route::post('team/update/{id}', [TeamMemberController::class, 'update'])->name('team.update');

    // __ Team Members __//
    Route::get('stories/add', [StoryController::class, 'add'])->name('stories.add');
    Route::post('stories/store', [StoryController::class, 'store'])->name('stories.store');
    Route::get('stories/index', [StoryController::class, 'index'])->name('stories.index');
    Route::get('stories/delete/{id}', [StoryController::class, 'destroy'])->name('stories.delete');
    Route::get('stories/edit/{id}', [StoryController::class, 'edit'])->name('stories.edit');
    Route::post('stories/update/{id}', [StoryController::class, 'update'])->name('stories.update');

    // __ FAQ __//
    Route::get('faq/add', [FaqController::class, 'add'])->name('faq.add');
    Route::post('faq/store', [FaqController::class, 'store'])->name('faq.store');
    Route::get('faq/index', [FaqController::class, 'index'])->name('faq.index');
    Route::get('faq/delete/{id}', [FaqController::class, 'destroy'])->name('faq.delete');
    Route::get('faq/edit/{id}', [FaqController::class, 'edit'])->name('faq.edit');
    Route::post('faq/update/{id}', [FaqController::class, 'update'])->name('faq.update');

    // __ Volunteer Applications (from public form) __//
    Route::get('volunteer-applications', [VolunteerApplicationController::class, 'index'])->name('admin.volunteer_applications.index');
    Route::get('volunteer-applications/delete/{id}', [VolunteerApplicationController::class, 'destroy'])->name('admin.volunteer_applications.delete');

    // __ Payment Methods __//
    Route::get('payment-methods/add', [PaymentMethodController::class, 'add'])->name('admin.payment_methods.add');
    Route::post('payment-methods/store', [PaymentMethodController::class, 'store'])->name('admin.payment_methods.store');
    Route::get('payment-methods/index', [PaymentMethodController::class, 'index'])->name('admin.payment_methods.index');
    Route::get('payment-methods/delete/{id}', [PaymentMethodController::class, 'destroy'])->name('admin.payment_methods.delete');
    Route::get('payment-methods/edit/{id}', [PaymentMethodController::class, 'edit'])->name('admin.payment_methods.edit');
    Route::post('payment-methods/update/{id}', [PaymentMethodController::class, 'update'])->name('admin.payment_methods.update');
    Route::get('payment-methods/toggle/{id}', [PaymentMethodController::class, 'toggleStatus'])->name('admin.payment_methods.toggle');

    // __ Donations __//
    Route::resource('donation-campaigns', DonationCampaignController::class)->names('admin.donation_campaigns');
    Route::get('donations/index', [DonationController::class, 'index'])->name('admin.donations.index');
    Route::get('donations/show/{id}', [DonationController::class, 'show'])->name('admin.donations.show');
    Route::post('donations/verify/{id}', [DonationController::class, 'verify'])->name('admin.donations.verify');
    Route::post('donations/reject/{id}', [DonationController::class, 'reject'])->name('admin.donations.reject');
    Route::get('donations/delete/{id}', [DonationController::class, 'destroy'])->name('admin.donations.delete');

    // Projects
    Route::resource('projects', ProjectListController::class)->names('admin.projects');
    Route::patch('projects/{project}/toggle-status', [ProjectListController::class, 'toggleStatus'])->name('admin.projects.toggle-status');

    // __ Annual Reports __//
    Route::resource('annual-reports', AnnualReportController::class)->names('admin.annual_reports');

    // __ Financial Statements __//
    Route::resource('financial-statements', FinancialStatementController::class)->names('admin.financial_statements');

    // __ Audit Reports __//
    Route::resource('audit-reports', AuditReportController::class)->names('admin.audit_reports');

    // __ Settings __//
    Route::get('settings', [SettingController::class, 'index'])->name('settings.index');
    Route::put('settings', [SettingController::class, 'update'])->name('settings.update');

    // __ Impact Matrix __//
    Route::get('impact', [SettingController::class, 'impact'])->name('admin.impact');
    Route::put('impact', [SettingController::class, 'impactUpdate'])->name('admin.impact.update');

    // __ Board of Directors __//
    Route::get('board-of-directors', [BoardOfDirectorController::class, 'index'])->name('admin.board_of_directors.index');
    Route::get('board-of-directors/create', [BoardOfDirectorController::class, 'create'])->name('admin.board_of_directors.create');
    Route::post('board-of-directors', [BoardOfDirectorController::class, 'store'])->name('admin.board_of_directors.store');
    Route::get('board-of-directors/{boardOfDirector}/edit', [BoardOfDirectorController::class, 'edit'])->name('admin.board_of_directors.edit');
    Route::put('board-of-directors/{boardOfDirector}', [BoardOfDirectorController::class, 'update'])->name('admin.board_of_directors.update');
    Route::delete('board-of-directors/{boardOfDirector}', [BoardOfDirectorController::class, 'destroy'])->name('admin.board_of_directors.destroy');

    // __ Volunteer Info (Volunteer Page Content) __//
    Route::get('volunteer-info', [VolunteerInfoController::class, 'index'])->name('admin.volunteer_info.index');
    Route::post('volunteer-info', [VolunteerInfoController::class, 'store'])->name('admin.volunteer_info.store');
    Route::get('volunteer-info/{id}/edit', [VolunteerInfoController::class, 'edit'])->name('admin.volunteer_info.edit');
    Route::put('volunteer-info/{id}', [VolunteerInfoController::class, 'update'])->name('admin.volunteer_info.update');
    Route::post('volunteer-applications/{id}/status', [VolunteerInfoController::class, 'updateApplicationStatus'])->name('admin.volunteer_applications.update_status');

    // __ Legal Registrations (Legal Reg. Status) __//
    Route::get('legal-registrations', [LegalRegistrationController::class, 'index'])->name('admin.legal_registrations.index');
    Route::post('legal-registrations', [LegalRegistrationController::class, 'store'])->name('admin.legal_registrations.store');
    Route::get('legal-registrations/{id}/edit', [LegalRegistrationController::class, 'edit'])->name('admin.legal_registrations.edit');
    Route::put('legal-registrations/{id}', [LegalRegistrationController::class, 'update'])->name('admin.legal_registrations.update');
    Route::delete('legal-registrations/{id}', [LegalRegistrationController::class, 'destroy'])->name('admin.legal_registrations.destroy');

});
