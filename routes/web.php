<?php

use App\Http\Middleware\Authenticate;
use App\Livewire\ChillingWorkplace;
use App\Livewire\CommunityNoteSharingView;
use App\Livewire\CommunityNoteView;
use App\Livewire\CounsellingSection;
use App\Livewire\CrashCourseView;
use App\Livewire\DiscussionCommunity;
use App\Livewire\DonationDetails;
use App\Livewire\DonationView;
use App\Livewire\FinancialAids;
use App\Livewire\FundraisingView;
use App\Livewire\GuestLectureView;
use App\Livewire\KindergartenCuriccularLearning;
use App\Livewire\KindergartenInteractiveLearning;
use App\Livewire\KindergartenLanguageLearning;
use App\Livewire\KindergartenStudyView;
use App\Livewire\LectureNoteView;
use App\Livewire\MentalHealthArticleView;
use App\Livewire\MentalHealthWorkplace;
use App\Livewire\PastYearPaperView;
use App\Livewire\PastYearView;
use App\Livewire\Playground;
use App\Livewire\PrimarySecondaryStudyView;
use App\Livewire\SelfDonationDetail;
use App\Livewire\SelfDonationPage;
use App\Livewire\SelfTradeDetail;
use App\Livewire\SelfTradePage;
use App\Livewire\StressDetector;
use App\Livewire\StudyWorkplaceLive;
use App\Livewire\TradingDetails;
use App\Livewire\TradingView;
use App\Livewire\TutorialView;
use App\Livewire\UserProfile;
use App\Livewire\WebinarView;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get("/", function() {
    return redirect("/login");
});

Auth::routes();
Route::middleware(Authenticate::class)->group(function() {
    Route::get('/user-profile/{id}', UserProfile::class);
    Route::get('/study-workplace', StudyWorkplaceLive::class)->name('study-workplace');
    Route::get('/self-trading', SelfTradePage::class)->name('self-trade');
    Route::get('/self-trading/{id}', SelfTradeDetail::class);
    Route::get('/self-donation', SelfDonationPage::class)->name('self-donation');
    Route::get('/self-donation/{id}', SelfDonationDetail::class);
    Route::get('/trading', TradingView::class)->name('trading');
    Route::get('/trading/{id}', TradingDetails::class);
    Route::get('/donation', DonationView::class)->name('donation');
    Route::get('/donation/{id}', DonationDetails::class);
    Route::get('/study-workplace/kindergarten', KindergartenStudyView::class)->name('study-workplace-kindergarten');
    Route::get('/study-workplace/kindergarten/language', KindergartenLanguageLearning::class)->name('kindergarten-learning');
    Route::get('/study-workplace/kindergarten/curiccular', KindergartenCuriccularLearning::class)->name('kindergarten-curiccular');
    Route::get('/study-workplace/kindergarten/interactive', KindergartenInteractiveLearning::class)->name('kindergarten-interactive');

    Route::get('/study-workplace/primary-secondary', PrimarySecondaryStudyView::class)->name('study-workplace-primary-secondary');
    Route::get('/study-workplace/primary-secondary/crash-course/{id}', CrashCourseView::class);
    Route::get('/study-workplace/primary-secondary/webinar/{id}', WebinarView::class);
    Route::get('/study-workplace/primary-secondary/lecture-note/{id}', LectureNoteView::class);
    Route::get('/study-workplace/primary-secondary/tutorial/{id}', TutorialView::class);
    Route::get('/study-workplace/primary-secondary/guest-lecture/{id}', GuestLectureView::class);

    Route::get('/study-workplace/primary-secondary/discussion-community', DiscussionCommunity::class)->name('discussion-community');
    Route::get('/study-workplace/primary-secondary/past-year-paper', PastYearPaperView::class)->name('past-year-paper');
    Route::get('/study-workplace/primary-secondary/past-year-paper/{id}', PastYearView::class);
    Route::get('/study-workplace/primary-secondary/community-note-sharing', CommunityNoteSharingView::class)->name('community-note-sharing');
    Route::get('/study-workplace/primary-secondary/community-note-sharing/{id}', CommunityNoteView::class);

    Route::get('/financial-aids', FinancialAids::class)->name('financial-aids');

    Route::get('/chilling-workplace', ChillingWorkplace::class)->name('chilling-workplace');

    Route::get('/mental-health-workplace', MentalHealthWorkplace::class)->name('mental-health-workplace');
    Route::get('/mental-health-workplace/article/{id}', MentalHealthArticleView::class);
    Route::get('/mental-health-workplace/counselling-section', CounsellingSection::class)->name('counselling-section');
    Route::get('/mental-health-workplace/stress-detector', StressDetector::class)->name('stress-detector');
    Route::get('/mental-health-workplace/playground', Playground::class)->name('playground');

    Route::get('/fundraising', FundraisingView::class)->name('fundraising');
});

