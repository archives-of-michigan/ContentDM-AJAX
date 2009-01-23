require File.join(File.dirname(__FILE__),'..','spec_helper')
require 'curb'
require 'json'
require 'htmlentities'

describe "dmQuery" do
  before(:each) do
    @params = {
      'alias' => 'all',
      'field' => 'description',
      'searchstring' => [{
        'field' => 'description',
        'string' => 'michigan',
        'mode' => 'all'
      }]
    };
  end
  
  def do_post
    @results = execute_command('dmQuery', @params)
  end
  
  it "should be successful" do
    do_post
    
    @results.should == []
  end
  
  it "should search all collections" do
    do_post
    
    @results.should == []
  end
  
  it "should allow searches by alias" do
    @params['alias'] = ['p4006coll2']
    do_post
    
    @results.should == [false]
  end
end