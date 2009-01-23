require File.join(File.dirname(__FILE__),'..','spec_helper')
require 'json'

describe "collection_info" do
  before(:each) do
    @params = {
      'alias' => '/p4006coll2'
    }
  end
  
  def do_post
    @results = execute_command('collection_info', @params)
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
  it "should return [false] for an invalid alias" do
    @params = {
      'alias' => '/abcdef'
    }
    do_post
    
    @results.should == [false]
  end
end