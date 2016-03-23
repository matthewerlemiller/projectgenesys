<?php

use Carbon\Carbon;
use Austen\Repositories\ImageRepository;
use Austen\Repositories\MemberRepository;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class MemberController extends BaseController {

    protected $image;

    protected $member;

    public function __construct(ImageRepository $image, MemberRepository $member) {
        $this->image = $image;
        $this->member = $member;
    }


    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        $members = $this->member->all();
        
        return View::make('listmembers')->withMembers($members);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {

        return View::make('addmember'); 

    }


    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store() {

        // TODO : implement functionality to allow an optional automatic check 
        // in of member after creation. 

        $member = $this->member->store(Input::all());

        if ($member === false) return Response::json(['message' => 'Sorry, there was an error.'], 404);

        return Response::json(['data' => $member], 200);

    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id) {

        $member = $this->member->find($id);

        if ($member === false) return Redirect::route('dashboard');

        return View::make('member')->with($member);

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id) {
        
        $member = Member::find($id);

        return View::make('editmember')->withMember($member);

    }


    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update() {
        //TODO : Improve Edit functionality and validation.

        $member = $this->member->update(Input::all());

        if ($member === false) return Response::json(['message' => "Sorry, update failed"], 404);

        return Response::json(['message' => 'update successful', 'data' => $member], 200);

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id) {
        $deletion = $this->member->delete($id);

        if ($deletion === false) return Response::json(['message' => 'Sorry, there was a problem.'], 404); 

        return Response::json(['message' => 'Member deleted from database'], 200);

    }


    public function searchMembers() 
    {
        $q = Input::get('query');
        $query = DB::table('members');
        $searchTerms = explode(' ', $q);
        
        foreach($searchTerms as $term) {    
            $query->where('firstName', 'ILIKE', '%'. $term .'%')
                  ->orWhere('lastName', 'ILIKE', '%' . $term . '%');            
        }

        $results = $query->take(10)->get();
        
        // $results = Member::search($q)->get();

        foreach($results as $result) {
            $member = Member::find($result->id);
            $memberLastCheckIn = $member->checklogs()->orderBy('id', 'desc')->get()->first()["checkInDateTime"];

            if ($memberLastCheckIn) {
                $memberCheckedIn = Carbon::parse($memberLastCheckIn)->isToday() ? true : false;
            } else {
                $memberCheckedIn = false;
            }
            
            $result->checkedIn = $memberCheckedIn;
        }
        return Response::json(['data' => $results], 200);
    }



    public function uploadImage() {

        $file = Input::file('file');
        $upload = $this->image->upload($file, 'img/uploads/', false);

        if ($upload === false) {
            return Response::json(['message' => 'There was an error uploading the image'], 404);
        }

        return Response::json(['data' => $upload['imagePath']], 200);
    }


    
    public function get($memberId) {

        $member = $this->member->get($memberId);

        if ($member === false) return Response::json(['message' => 'Sorry, there was an error'], 404);

        return Response::json(['data' => $member], 200);

    }

    public function getStatus($memberId) {

        $status = $this->member->status($memberId);

        if ($status === false) return Response::json(['message' => 'Sorry, something went wrong on our end. try again later'], 404);

        return Response::json(['data' => $status], 200);
        
    }

    public function kickout() {

        $id = Input::get('memberId');
        $comments = Input::get('comments');

        $kickoutEvent = $this->member->kickout($id, $comments);

        if ($kickoutEvent === false) return Response::json(['message' => 'Sorry, kickout failed because of a server error. Try again later'], 404);

        return Response::json(['message' => 'Member kicked out'], 200);

    }

}
