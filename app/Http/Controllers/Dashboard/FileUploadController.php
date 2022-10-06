<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;
use Pion\Laravel\ChunkUpload\Handler\HandlerFactory;
use Pion\Laravel\ChunkUpload\Receiver\FileReceiver;
use File;

class FileUploadController extends Controller
{
    public function index(Request $request) {
        
        // https://stackoverflow.com/questions/57651583/how-to-read-all-folder-name-from-a-folder-in-laravel
        // $path = public_path('/');

        // $files = File::allfiles($path);
        // dd($files);
        
        // $foler_names = [];
        // $i = 0;
        // $dir = public_path().'/admin/UserImage';
        
        // //$files = File::allFiles($dir);
        // $dirList = scandir($dir);
        // //dd($dirList);
        // foreach ($dirList as $key => $value) {
        //   if (strpos($value, '.') !== false) {
        //     }else {
        //       $foler_names[$i] = $value;
        //       echo $value;
        //       echo '</br>'; 
        //       $i++;
        //     }
        // }
        
        //  die;
        
        return view('dashboard.upload-file.index');
    }

    public function uploadLargeFiles(Request $request) {
        $receiver = new FileReceiver('file', $request, HandlerFactory::classFromRequest($request));

        if (!$receiver->isUploaded()) {
            // file not uploaded
        }

        $fileReceived = $receiver->receive(); // receive file
        if ($fileReceived->isFinished()) { // file uploading is complete / all chunks are uploaded
            $file = $fileReceived->getFile(); // get file
            $extension = $file->getClientOriginalExtension();
            $fileName = str_replace('.'.$extension, '', $file->getClientOriginalName()); //file name without extenstion
            $fileName .= '_' . md5(time()) . '.' . $extension; // a unique file name

            $disk = Storage::disk(config('filesystems.default'));
            $path = $disk->putFileAs('videos', $file, $fileName);

            // delete chunked file
            unlink($file->getPathname());
            return [
                'path' => asset('storage/' . $path),
                'filename' => $fileName
            ];
        }

        // otherwise return percentage informatoin
        $handler = $fileReceived->handler();
        return [
            'done' => $handler->getPercentageDone(),
            'status' => true
        ];
    }
}
