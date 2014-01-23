class Classroom < ActiveRecord::Base
 	belongs_to :school
	belongs_to :course
	belongs_to :year
	belongs_to :period
end