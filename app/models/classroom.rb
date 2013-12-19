class Classroom < ActiveRecord::Base
	acts_as_tenant :school
	
 	belongs_to :school
  	belongs_to :course
  	belongs_to :year
  	belongs_to :period
end
