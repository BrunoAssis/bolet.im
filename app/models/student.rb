class Student < ActiveRecord::Base
	acts_as_tenant :school
	
	belongs_to :user
	belongs_to :school
	belongs_to :classroom
end
