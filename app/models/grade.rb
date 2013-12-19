class Grade < ActiveRecord::Base
	acts_as_tenant :school
	
	belongs_to :school
	belongs_to :student
	belongs_to :teacher_class
end
