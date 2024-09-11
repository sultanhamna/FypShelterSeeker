<?php

namespace App\Http\Controllers\Admin;
use Yajra\DataTables\DataTables;
use App\Models\Admin\Property;
use App\Models\Admin\Post;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax())
        {
            $data = Post::all();
            return Datatables::of($data)
            ->addIndexColumn()

                ->addColumn('action', function($row)
                {
                    $action = '';
                    $editUrl = route('edit.Post', $row->id);
                    $deleteUrl = route('delete.Post', $row->id);
                    $action .= '<a href=" ' . $editUrl  . '" class="btn btn-sm btn-primary"><i class="fa fa-eye" aria-hidden="true"></i> Edit</a>';
                    $action .= '&nbsp;
                                <button data-href="' . $deleteUrl . '" class="btn btn-sm btn-danger delete_post_button"><i class=" fas fa-trash-alt" ></i> Delete</button>';
                    return $action;
                })
                ->removecolumn('id')
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.Post.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.Post.createPost');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'property_post' => 'required|string|max:255',

        ]);
        $PostEntered = Post ::create($request->all());

      if($PostEntered==null)
      {
         return redirect()->route('index.Post')->with('error','Post is not Entered');
      }
      else
      {
        return redirect()->route('index.Post')->with('success', 'Post created successfully');
      }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        $data = Post::findorfail($id);

        return view('admin.Post.editPost', compact(['data',]));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'property_post' => 'required|string|max:255',

        ]);
        $PostUpdated=   Post::findorfail($id)->update($request->all());

        if( $PostUpdated==null)
      {
        return redirect()->route('index.Post')->with("error","Post is  not updated");
      }
      else
      {
          return redirect()->route('index.Post')->with("success","Post is  updated");
      }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try
        {
            // Find the post by its ID with property eager loaded
            $post = Post::with('property')->findOrFail($id);

            if ($post->property()->count() > 0)
            {
                return response()->json(['error' => 'Post is not deleted because it has related property']);
            }

            $post->delete();

            return response()->json(['success' => 'Post deleted successfully']);
        } catch (\Exception $e)
        {
            return response()->json(['error' => 'Failed to delete post: '. $e->getMessage()], 500);
        }
    }
}
