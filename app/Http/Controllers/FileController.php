<?php

namespace App\Http\Controllers;

use App\File;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'image' => 'file',
            'type' => 'required|in:report,article',
            'id' => 'required|numeric',
        ]);

        $entity = $this->getEntity($request->input('type'), $request->input('id'));

        $filename = $request->file('image')->storePublicly(config('filesystems.disks.spaces.path'), ['disk' => 'spaces']);

        $file = new File();
        $file->file = $filename;
        $file->position = $entity->files->count() + 1;

        // When this is the first image, make it the main image
        if ($file->position == 1)
        {
            $entity->image = $file->file;
            $entity->save();
        }

        $entity->files()->save($file);

        return back();
    }
    /**
     * Update the file to be the main image for the given resource
     *
     * @param File $file
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(File $file, Request $request)
    {
        $this->validate($request, [
            'type' => 'required|in:report,article',
            'id' => 'required|numeric',
        ]);

        $entity = $this->getEntity($request->input('type'), $request->input('id'));
        $entity->image = $file->file;
        $entity->save();

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\File  $file
     * @return \Illuminate\Http\Response
     */
    public function destroy(File $file)
    {
        Storage::disk('spaces')->delete($file->file);

        $file->delete();

        return back();
    }

    /**
     * @param string $type
     * @param int $id
     * @return Model
     */
    private function getEntity($type, $id)
    {
        $class = 'App\\' . ucfirst($type);

        return $class::find($id);
    }
}
