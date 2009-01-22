# require '../spec_helper.rb'
require 'curb'
require 'json'

describe "collection_info" do
  before(:each) do
    @curl = Curl::Easy.new("http://haldigitalcollections.cdmhost.com/cdm_ajax/cdm_server.php")
    @params = {
      'alias' => '/p4006coll2'
    }
  end
  
  def do_post
    @curl.http_post(
      Curl::PostField.content('command', 'collection_info'),
      Curl::PostField.content('params', @params.to_json))
    puts @curl.body_str
    @results = JSON.parse(@curl.body_str)
  end
  
  it "should return the collection name" do
    do_post
    @results['name'].should == 'Governors of Michigan'
  end
  it "should return the collection image settings" do
    do_post
    @results['full_res_info'].should be_a_kind_of(Hash)
    @results['full_res_info']['archivesize'].should == {"height"=>"2400", "width"=>"3200"}
  end
  it "should return false for an invalid alias" do
    @params = {
      'alias' => '/abcdef'
    }
    do_post
    
    results.should be_false
  end
end