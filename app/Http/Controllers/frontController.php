<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class frontController extends Controller
{
    // about us
    public function about_us()
    {
        $about_us = DB::table('about_us')->first();
        $team = DB::table('team_members')->orderBy('order', 'asc')->get();

        return view('frontend.about_us', compact('about_us', 'team'));
    }

    // Subscribe
    public function subscribe(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|unique:subscribe|max:255',
        ]);

        $subscribe = [[
            'name' => $request->name,
            'email' => $request->email,
        ]];

        DB::table('subscribe')->insert($subscribe);

        return redirect()->back()->with('success', 'Thanks for Subscribed us!!!!');
    }

    // vision and mission
    public function vision_mission()
    {
        $mission_vision = DB::table('mission_vision')->first();
        $about = DB::table('about_us')->first();

        return view('frontend.mission_vision', compact('mission_vision', 'about'));
    }

    // team members
    public function teamMembers()
    {
        $team = DB::table('team_members')->orderBy('order', 'asc')->get();

        return view('frontend.team_members', compact('team'));
    }

    // origin and legal affilation
    public function origin_affilation()
    {
        $affilation = DB::table('legal_affilation')->get();
        $legalRegistrations = DB::table('legal_registrations')->where('is_active', 1)->orderBy('order', 'asc')->orderBy('id', 'asc')->get();

        return view('frontend.origin_affilation', compact('affilation', 'legalRegistrations'));
    }

    // Message form Cheif Executive
    public function cheif_msg()
    {
        $message = DB::table('chief_executive_message')->orderBy('id', 'desc')->first();

        return view('frontend.cheif_message', compact('message'));
    }

    // Board of Directors
    public function boardOfDirectors()
    {
        $directors = \App\Models\BoardOfDirector::active()->ordered()->get();

        return view('frontend.board_of_directors', compact('directors'));
    }

    // Partner and Donor
    public function partner()
    {
        $partners = DB::table('partners')->get();

        return view('frontend.partner', compact('partners'));
    }

    // impact page removed — method deleted because page is no longer required.

    // Project Archieve
    public function proj_archieve()
    {
        $project = Project::query()->where('status', 'completed')->orderBy('created_at', 'desc')->get();

        return view('frontend.project_archieve', compact('project'));
    }

    // Ongoing Project
    public function ongoing_project()
    {
        $project = Project::query()->where('status', 'ongoing')
            ->orderBy('priority', 'asc')
            ->orderBy('created_at', 'desc')
            ->paginate(15);

        return view('frontend.ongoing_project', compact('project'));
    }

    // __ongoing Project view__//
    public function project_view(int $id)
    {
        $project = Project::with('galleries')->findOrFail($id);

        return view('frontend.project_view', compact('project'));
    }

    // __Latest News All__//
    public function news_all()
    {
        $news = DB::table('latest_news')->orderBy('news_date', 'desc')->orderBy('id', 'desc')->paginate(15);

        return view('frontend.news_all', compact('news'));
    }

    // Youtube
    public function youtube()
    {
        $videos = \App\Models\YoutubeVideo::query()->where('is_active', 1)->orderBy('order', 'asc')->get();

        return view('frontend.youtube', compact('videos'));
    }

    // Youtube
    public function stories()
    {
        $stories = DB::table('stories')->orderBy('id', 'desc')->get();

        return view('frontend.stories', compact('stories'));
    }

    // Story View
    public function storiesView(int $id)
    {
        $story = DB::table('stories')->where('id', $id)->first();

        return view('frontend.story_view', compact('story'));
    }

    // __Latest News view__//
    public function news_view(int $id)
    {
        $news = DB::table('latest_news')->where('id', $id)->first();

        return view('frontend.news_view', compact('news'));
    }

    // Strategic Plan
    public function strategic_plan()
    {
        $strategicPlans = DB::table('strategic_plans')->orderBy('created_at', 'desc')->get();

        return view('frontend.strategic_plan', compact('strategicPlans'));
    }

    // Policy Guideline
    public function policy_guideline()
    {
        $policy = DB::table('policy_guideline')->get();

        return view('frontend.policy_guideline', compact('policy'));
    }

    // Publication
    public function publication()
    {
        $publications = DB::table('publications')->orderBy('created_at', 'desc')->get();

        return view('frontend.publication', compact('publications'));
    }

    // Get Involved
    public function career()
    {
        $career = DB::table('invoked')->get();
        $about_us = DB::table('about_us')->first();

        return view('frontend.career', compact('career', 'about_us'));
    }

    // Volunteer Page
    public function volOpportunities()
    {
        $volunteerInfo = DB::table('volunteer_info')->first();
        $applications = DB::table('volunteer_applications')->orderBy('created_at', 'desc')->get();

        return view('frontend.volunteer_opportunities', compact('volunteerInfo', 'applications'));
    }

    // Volunteer Application Submit
    public function volunteerSubmit(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'location' => 'nullable|string|max:255',
            'interest' => 'nullable|string|max:255',
            'message' => 'nullable|string|max:2000',
        ]);

        DB::table('volunteer_applications')->insert([
            'name' => trim($validated['name']),
            'email' => strtolower(trim($validated['email'])),
            'phone' => trim($validated['phone']),
            'location' => $validated['location'] ? trim($validated['location']) : null,
            'interest' => $validated['interest'] ?? null,
            'message' => $validated['message'] ? trim($validated['message']) : null,
            'status' => 'pending',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->back()->with('success', 'Thank you for volunteering with Ornab Cox\'s Bazar! Our team will contact you soon.');
    }

    // Donate
    public function donate()
    {
        $paymentMethods = \App\Models\PaymentMethod::active()->get();
        $campaigns = DB::table('donation_campaigns')->where('status', 'active')->orderBy('order')->orderBy('id', 'desc')->get();

        return view('frontend.donate', compact('paymentMethods', 'campaigns'));
    }

    // Donation Submit
    public function donationSubmit(Request $request)
    {
        $validatedData = $request->validate([
            'donor_name' => 'required|string|max:255',
            'donor_phone' => 'required|string|max:20',
            'transaction_id' => 'required|string|max:255',
            'amount' => 'required|numeric|min:1',
            'payment_method_id' => 'required|exists:payment_methods,id',
            'campaign_id' => 'nullable|exists:donation_campaigns,id',
            'purpose' => 'nullable|string|max:255',
            'donation_type' => 'nullable|in:one_time,monthly',
            'is_anonymous' => 'nullable|boolean',
        ]);

        \App\Models\Donation::create([
            'donor_name' => $request->donor_name,
            'donor_phone' => $request->donor_phone,
            'transaction_id' => $request->transaction_id,
            'amount' => $request->amount,
            'payment_method_id' => $request->payment_method_id,
            'campaign_id' => $request->campaign_id,
            'purpose' => $request->purpose,
            'donation_type' => $request->donation_type ?? 'one_time',
            'is_anonymous' => (bool) $request->boolean('is_anonymous'),
            'status' => 'pending',
        ]);

        return redirect()->back()->with('success', 'Thank you for your donation! We will verify it soon.');
    }

    // Get Contact
    public function contact()
    {
        $head_office = DB::table('contacts')->where('type', 'head_office')->where('status', 'active')->first();
        $branches = DB::table('contacts')->where('type', 'branch')->where('status', 'active')->get();
        $persons = DB::table('contacts')->where('type', 'person')->where('status', 'active')->get();

        return view('frontend.contact', compact('head_office', 'branches', 'persons'));
    }

    // Message Store
    public function messageStore(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|max:5000',
        ]);

        DB::table('messages')->insert([
            'name' => trim($validatedData['name']),
            'email' => strtolower(trim($validatedData['email'])),
            'subject' => trim($validatedData['subject']),
            'message' => trim($validatedData['message']),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->back()->with('success', 'Successfully Submitted Your Message.');
    }

    // __All Photos
    public function all_photos()
    {
        $photosByAlbum = DB::table('gallery')
            ->orderBy('album', 'asc')
            ->orderBy('id', 'desc')
            ->get()
            ->groupBy(function ($row) {
                return $row->album ?: 'General';
            });

        return view('frontend.photos_all', compact('photosByAlbum'));
    }

    // __Albums
    public function albums()
    {
        $albumAgg = DB::table('gallery')
            ->select('album', DB::raw('MAX(id) as cover_id'), DB::raw('COUNT(*) as photo_count'))
            ->groupBy('album')
            ->orderBy('cover_id', 'desc')
            ->get();

        $coverRows = DB::table('gallery')
            ->whereIn('id', $albumAgg->pluck('cover_id'))
            ->get()
            ->keyBy('id');

        $albums = $albumAgg->map(function ($row) use ($coverRows) {
            $name = $row->album ?: 'General';
            $cover = $coverRows->get($row->cover_id);

            return (object) [
                'name' => $name,
                'cover_image' => $cover ? $cover->image : null,
                'photo_count' => (int) $row->photo_count,
            ];
        })->values();

        return view('frontend.gallery_albums', compact('albums'));
    }

    // __Single Album Photos
    public function album_photos(string $album)
    {
        $query = DB::table('gallery')->orderBy('id', 'desc');

        if ($album === 'General') {
            $query->where(function ($q) {
                $q->whereNull('album')->orWhere('album', 'General');
            });
        } else {
            $query->where('album', $album);
        }

        $photos = $query->get();

        return view('frontend.album_photos', [
            'album' => $album,
            'photos' => $photos,
        ]);
    }

    // FAQ
    public function faq()
    {
        $faqs = DB::table('faq')->orderBy('order', 'asc')->get();

        return view('frontend.faq', compact('faqs'));
    }

    // Annual Reports (Transparency)
    public function annualReports()
    {
        $reports = \App\Models\AnnualReport::active()->orderBy('year', 'desc')->orderBy('order', 'asc')->get();
        return view('frontend.annual_reports', compact('reports'));
    }

    // Financial Statements (Transparency)
    public function financialStatements()
    {
        $statements = \App\Models\FinancialStatement::active()->orderBy('year', 'desc')->orderBy('order', 'asc')->get();
        return view('frontend.financial_statements', compact('statements'));
    }

    // Audit Reports (Transparency)
    public function auditReports()
    {
        $reports = \App\Models\AuditReport::active()->ordered()->get();
        return view('frontend.audit_reports', compact('reports'));
    }

    // Focus Areas
    public function focusAreas()
    {
        $focusAreas = [
            [
                'slug' => 'womens-empowerment',
                'title' => 'Women\'s Empowerment',
                'image' => 'https://images.pexels.com/photos/1371360/pexels-photo-1371360.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940',
                'short_description' => 'Promoting gender equality and empowerment through education, skill-building, and advocacy for women\'s rights.',
                'full_description' => 'Our Women\'s Empowerment program is dedicated to promoting gender equality and empowering women through education, skill-building, and advocacy for women\'s rights. We believe that when women are empowered, entire communities thrive. Our initiatives include vocational training, literacy programs, legal awareness campaigns, and microfinance support to help women achieve financial independence and social equality.',
                'status' => 'active',
            ],
            [
                'slug' => 'youth-development',
                'title' => 'Youth Development',
                'image' => 'https://images.pexels.com/photos/2659475/pexels-photo-2659475.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940',
                'short_description' => 'Empowering the next generation through mentorship, education, and community engagement to foster leadership.',
                'full_description' => 'Our Youth Development program empowers the next generation through mentorship, education, and community engagement to foster leadership. We provide young people with the skills, knowledge, and opportunities they need to become active, engaged members of their communities. Our programs include leadership workshops, scholarship programs, sports and cultural activities, and career guidance counseling.',
                'status' => 'active',
            ],
            [
                'slug' => 'healthcare-access',
                'title' => 'Healthcare Access',
                'image' => 'https://images.pexels.com/photos/4388165/pexels-photo-4388165.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940',
                'short_description' => 'Providing essential healthcare services, awareness campaigns, and medical assistance to underserved communities.',
                'full_description' => 'Our Healthcare Access program provides essential healthcare services, awareness campaigns, and medical assistance to underserved communities in Bangladesh. We work to bridge the healthcare gap by organizing medical camps, providing free health checkups, distributing medicines, and running awareness campaigns on maternal health, child nutrition, and disease prevention in remote and marginalized communities.',
                'status' => 'active',
            ],
        ];

        return view('frontend.focus_areas', compact('focusAreas'));
    }

    public function focusAreaDetail(string $slug)
    {
        $focusAreas = [
            [
                'slug' => 'womens-empowerment',
                'title' => 'Women\'s Empowerment',
                'image' => 'https://images.pexels.com/photos/1371360/pexels-photo-1371360.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940',
                'short_description' => 'Promoting gender equality and empowerment through education, skill-building, and advocacy for women\'s rights.',
                'full_description' => 'Our Women\'s Empowerment program is dedicated to promoting gender equality and empowering women through education, skill-building, and advocacy for women\'s rights. We believe that when women are empowered, entire communities thrive. Our initiatives include vocational training, literacy programs, legal awareness campaigns, and microfinance support to help women achieve financial independence and social equality.',
                'status' => 'active',
            ],
            [
                'slug' => 'youth-development',
                'title' => 'Youth Development',
                'image' => 'https://images.pexels.com/photos/2659475/pexels-photo-2659475.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940',
                'short_description' => 'Empowering the next generation through mentorship, education, and community engagement to foster leadership.',
                'full_description' => 'Our Youth Development program empowers the next generation through mentorship, education, and community engagement to foster leadership. We provide young people with the skills, knowledge, and opportunities they need to become active, engaged members of their communities. Our programs include leadership workshops, scholarship programs, sports and cultural activities, and career guidance counseling.',
                'status' => 'active',
            ],
            [
                'slug' => 'healthcare-access',
                'title' => 'Healthcare Access',
                'image' => 'https://images.pexels.com/photos/4388165/pexels-photo-4388165.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940',
                'short_description' => 'Providing essential healthcare services, awareness campaigns, and medical assistance to underserved communities.',
                'full_description' => 'Our Healthcare Access program provides essential healthcare services, awareness campaigns, and medical assistance to underserved communities in Bangladesh. We work to bridge the healthcare gap by organizing medical camps, providing free health checkups, distributing medicines, and running awareness campaigns on maternal health, child nutrition, and disease prevention in remote and marginalized communities.',
                'status' => 'active',
            ],
        ];

        $focusArea = collect($focusAreas)->firstWhere('slug', $slug);

        if (!$focusArea) {
            abort(404);
        }

        return view('frontend.focus_area_detail', compact('focusArea'));
    }
}
