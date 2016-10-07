#!/usr/bin/perl

my $mode=0; #0 or 1. 0 is not
#my $regexp="mysql_conne";
my $regexp="<!--";

chdir @ARGV[0];

#print @ARGV[0]."\n";
#if(!$mode){
#	print "There file aren't fuonded \"session_start\". Maybe there file aren't complate.\n\n";
#}else{ 
#	print "There file are fuond \"session_start\". Maybe there file aren't complate.\n\n";
#}
#
@file=glob "*.php";

foreach(@file){
	open(FH,"$_");
	while($line=<FH>){
		if($line=~m/$regexp/){
			print $_."\n";
			last;
			goto to;
		}
	}
	if(!$mode){
		print $_."\n";
	}

	to:
	close($_);
}
