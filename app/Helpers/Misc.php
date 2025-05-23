<?php

use Carbon\Carbon;
use Intervention\Image\Laravel\Facades\Image;
use RealRashid\SweetAlert\Facades\Alert;

/*
|--------------------------------------------------------------------------
| Date and Time Functions
|--------------------------------------------------------------------------
*/

if (! function_exists('bdDate')) {
    function bdDate($date)
    {
        return $date ? Carbon::parse($date)->format('d/m/Y') : null;
    }
}

if (! function_exists('bdDateTime')) {
    function bdDateTime($date)
    {
        return $date ? Carbon::parse($date)->format('d/m/Y h:i A') : null;
    }
}

if (! function_exists('stringToDate')) {
    function stringToDate(string $date): Carbon
    {
        return Carbon::createFromFormat('d/m/Y', $date);
    }
}

if (! function_exists('sqlDate')) {
    function sqlDate(string $date): string
    {
        return Carbon::parse(Carbon::createFromFormat('d/m/Y', $date))->format('Y-m-d');
    }
}

if (! function_exists('ageWithDays')) {
    function ageWithDays(string $d_o_b): string
    {
        return Carbon::parse($d_o_b)->diff(Carbon::now())->format('%y years, %m months and %d days');
    }
}

if (! function_exists('ageWithMonths')) {
    function ageWithMonths(string $d_o_b): string
    {
        return Carbon::parse($d_o_b)->diff(Carbon::now())->format('%y years, %m months');
    }
}

/*
|--------------------------------------------------------------------------
| Number and String Functions
|--------------------------------------------------------------------------
*/

if (! function_exists('pad6')) {
    function pad6(int $number): string
    {
        return str_pad((string) $number, 6, '0', STR_PAD_LEFT);
    }
}

if (! function_exists('nF2')) {
    function nF2(float $number): string
    {
        return number_format($number, 2);
    }
}

if (! function_exists('nFA2')) {
    function nFA2(float $num): string
    {
        return number_format(abs($num), 2);
    }
}

if (! function_exists('hpnToUscr')) {
    function hpnToUscr(string $route): string
    {
        return str_replace('-', '_', $route);
    }
}

if (! function_exists('slug')) {
    function slug(string $text): string
    {
        $array = [':', ',', '.', '!', '|', '।', 'ঃ', '{', '}', '[', ']', '(', ')', '৳', '%', '$', '#', '@', '*', '+', ';'];
        $slug = strtolower(str_replace($array, '', trim($text)));

        return str_replace(' ', '-', $slug);
    }
}

if (! function_exists('numberToNotation')) {
    function numberToNotation(float $number, int $precision = 1): string
    {
        $suffixes = ['', 'K', 'M', 'B', 'T'];
        $suffixIndex = 0;
        while ($number >= 900 && $suffixIndex < count($suffixes) - 1) {
            $number /= 1000;
            $suffixIndex++;
        }
        $formattedNumber = number_format($number, $precision);
        if ($precision > 0) {
            $formattedNumber = rtrim($formattedNumber, '0');
            $formattedNumber = rtrim($formattedNumber, '.');
        }

        return $formattedNumber.$suffixes[$suffixIndex];
    }
}

if (! function_exists('capitalizeWithoutPrepositions')) {
    function capitalizeWithoutPrepositions(string $string): string
    {
        $prepositions = ['and', 'or', 'but', 'for', 'so', 'yet', 'on', 'in', 'at', 'to', 'by'];
        $words = explode(' ', $string);
        $capitalizedWords = array_map(function ($word) use ($prepositions) {
            return in_array(strtolower($word), $prepositions) ? strtolower($word) : ucfirst($word);
        }, $words);

        return implode(' ', $capitalizedWords);
    }
}

if (! function_exists('numberToRoman')) {
    function numberToRoman(int $num): string
    {
        $n = intval($num);
        $result = '';

        $lookup = [
            'M' => 1000,
            'CM' => 900,
            'D' => 500,
            'CD' => 400,
            'C' => 100,
            'XC' => 90,
            'L' => 50,
            'XL' => 40,
            'X' => 10,
            'IX' => 9,
            'V' => 5,
            'IV' => 4,
            'I' => 1,
        ];

        foreach ($lookup as $roman => $value) {
            $matches = intval($n / $value);
            $result .= str_repeat($roman, $matches);
            $n %= $value;
        }

        return $result;
    }
}

if (! function_exists('readableSize')) {
    function readableSize($n): string
    {
        $n = (float) str_replace(',', '', $n);

        if (! is_numeric($n)) {
            return (string) $n;
        }

        if ($n >= 1_000_000_000_000) {
            return round($n / 1_000_000_000_000, 1).' TB';
        } elseif ($n >= 1_000_000_000) {
            return round($n / 1_000_000_000, 1).' GB';
        } elseif ($n >= 1_000_000) {
            return round($n / 1_000_000, 1).' MB';
        } elseif ($n >= 1_000) {
            return round($n / 1_000, 1).' KB';
        }

        return number_format($n);
    }
}

if (! function_exists('cVar')) {
    function cVar($name, $data)
    {
        return config('var.'.$name)[$data] ?? null;
    }
}

/*
|--------------------------------------------------------------------------
| Navigation Functions
|--------------------------------------------------------------------------
*/
if (! function_exists('isActive')) {
    function isActive($routes)
    {
        if (is_array($routes)) {
            foreach ($routes as $route) {
                if (request()->routeIs($route)) {
                    return 'active';
                }
            }
        } elseif (request()->routeIs($routes)) {
            return 'active';
        }

        return '';
    }
}

/*
|--------------------------------------------------------------------------
| Image Functions
|--------------------------------------------------------------------------
*/

if (! function_exists('processAndStoreImage')) {
    /**
     * Processes and stores an uploaded image.
     *
     * @param  mixed  $image  The uploaded image instance.
     * @param  string  $path  The directory path to store the image.
     * @param  array|null  $size  The desired dimensions of the image (width, height).
     * @param  string|null  $oldImage  The name of the old image file to be replaced.
     * @return string The name of the stored image file.
     */
    function processAndStoreImage($image, string $path, ?array $size = null, ?string $oldImage = null): string
    {
        $directory = public_path('uploads/images/'.$path);

        // Create the directory if it doesn't exist
        if (! is_dir($directory)) {
            mkdir($directory, 0777, true);
        }

        $extension = strtolower($image->getClientOriginalExtension());

        // Remove the old image if it exists
        if ($oldImage && file_exists($directory.'/'.$oldImage)) {
            unlink($directory.'/'.$oldImage);
        }

        // Handle SVG images separately
        if ($extension === 'svg') {
            $imageName = $path.'-'.uniqid().'.svg';
            $image->move($directory, $imageName);

            return $imageName;
        }

        // Process and save other image formats
        $image = Image::read($image);

        // Resize the image if dimensions are provided
        if ($size && count($size) == 2) {
            $image->cover($size[0], $size[1]);
        } elseif ($size && isset($size[0])) {
            $image->resize($size[0], null, function ($constraint) {
                $constraint->aspectRatio();
            });
        }

        $imageName = $path.'-'.uniqid().'.'.($extension === 'png' ? 'png' : 'webp');
        $image->save($directory.'/'.$imageName, 80, $extension === 'png' ? null : 'webp');

        return $imageName;
    }
}

if (! function_exists('imgUnlink')) {
    function imgUnlink(string $folder, $image): bool
    {
        $path = public_path('uploads/images/'.$folder.'/'.$image);
        if ($image && file_exists($path)) {
            return unlink($path);
        }

        return false;
    }
}
if (! function_exists('getImgUrl')) {
    function getImgUrl(string $folder, ?string $image): string
    {
        $path = "uploads/images/{$folder}/{$image}";

        return $image && file_exists($path)
            ? asset($path)
            : asset('common/images/no-img.svg');
    }
}

if (! function_exists('getAppLogo')) {
    function getAppLogo(string $mode = 'light', string $size = 'large'): string
    {
        $logoType = ($mode === 'light') ? 'logo-light' : 'logo-dark';
        $suffix = ($size === 'small') ? '-small' : '';
        // $path = "common/images/logo/{$logoType}{$suffix}.png";
        $path = 'common/images/logo/blri-logo.png';

        return asset($path);
    }
}

if (! function_exists('getFavicon')) {
    function getFavicon(): string
    {
        return asset('common/images/logo/favicon.png');
    }
}

if (! function_exists('getProfileImg')) {
    function getProfileImg(): string
    {
        $path = 'uploads/images/user/'.user()?->image;

        return asset(file_exists(asset($path)) ? $path : 'common/images/user/avatar.svg');
    }
}

/*
|--------------------------------------------------------------------------
| User Functions
|--------------------------------------------------------------------------
*/

if (! function_exists('user')) {
    function user(): ?\Illuminate\Contracts\Auth\Authenticatable
    {
        return auth()->user();
    }
}

if (! function_exists('isSuperAdmin')) {
    function isSuperAdmin()
    {
        return user()->role == 1;
    }
}

if (! function_exists('isAdmin')) {
    function isAdmin()
    {
        return user()->role == 2;
    }
}

/*
|--------------------------------------------------------------------------
| OS and Browser Functions
|--------------------------------------------------------------------------
*/

if (! function_exists('getOS')) {
    function getOS(string $userAgent): string
    {
        $osPlatform = 'Unknown OS';

        $osArray = [
            '/Windows NT 10.0/' => 'Windows 10',
            '/Windows NT 6.1/' => 'Windows 7',
            '/Windows NT 6.0/' => 'Windows Vista',
            '/Macintosh/' => 'Mac OS',
            '/Linux/' => 'Linux',
            '/Android/' => 'Android',
            '/iPhone/' => 'iOS',
        ];

        foreach ($osArray as $regex => $value) {
            if (preg_match($regex, $userAgent)) {
                $osPlatform = $value;
                break;
            }
        }

        return $osPlatform;
    }
}

if (! function_exists('getBrowser')) {
    function getBrowser(string $userAgent): string
    {
        $browser = 'Unknown Browser';

        if (preg_match('/Chrome/', $userAgent)) {
            $browser = 'Chrome';
        } elseif (preg_match('/Firefox/', $userAgent)) {
            $browser = 'Firefox';
        } elseif (preg_match('/Safari/', $userAgent)) {
            $browser = 'Safari';
        } elseif (preg_match('/Edge/', $userAgent)) {
            $browser = 'Edge';
        } elseif (preg_match('/MSIE/', $userAgent)) {
            $browser = 'Internet Explorer';
        }

        return $browser;
    }
}

/*
|--------------------------------------------------------------------------
| Transaction ID Functions
|--------------------------------------------------------------------------
*/

if (! function_exists('tranId')) {
    function tranId(string $src = '', int $length = 12): string
    {
        if (function_exists('random_bytes')) {
            $bytes = random_bytes(ceil($length / 2));
        } elseif (function_exists('openssl_random_pseudo_bytes')) {
            $bytes = openssl_random_pseudo_bytes(ceil($length / 2));
        } else {
            throw new \Exception('No cryptographically secure random function available');
        }

        $id = strtoupper(substr(bin2hex($bytes), 0, $length));

        return $src !== '' ? strtoupper($src.'_'.$id) : $id;
    }
}

if (! function_exists('uniqueId')) {
    function uniqueId(int $length = 8): string
    {
        if (function_exists('random_bytes')) {
            $bytes = random_bytes(ceil($length / 2));
        } elseif (function_exists('openssl_random_pseudo_bytes')) {
            $bytes = openssl_random_pseudo_bytes(ceil($length / 2));
        } else {
            throw new \Exception('No cryptographically secure random function available');
        }

        return substr(bin2hex($bytes), 0, $length);
    }
}

/*
|--------------------------------------------------------------------------
| Message Functions
|--------------------------------------------------------------------------
*/
if (! function_exists('accessMsg')) {
    function accessMsg()
    {
        Alert::error('You do not have permission to access this page.');

        return back();
    }
}
