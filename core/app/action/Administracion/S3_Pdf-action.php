<?php
include_once('composer/vendor/autoload.php');

use Aws\S3\S3Client;
use Aws\Exception\AwsException;


$S3Options =
	[
		'version' => 'latest',
		'region'  => 'us-east-2',
		'ContentType'=> 'application/pdf',
		'credentials' =>
		[
			'key' => 'AKIAVR2SWSSHG44MO2E4',
			'secret' => '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'
		]
	];

$s3 = new S3Client($S3Options);



$uploadObject = $s3->putObject(
    [
        'Bucket' => 'ebgym',
        'Key' => 'doc.pdf',
        'SourceFile' => 'doc.pdf',
        'ContentType'=> 'application/pdf',
        'ACL'    => 'public-read'
    ]
);


include("core/app/action/Administracion/Mensaje_Pdf-action.php");

core::redir("./?view=Bienvenida");