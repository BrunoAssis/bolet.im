class Course < ActiveRecord::Base
	belongs_to :school

  validates :school, presence: true
  validates :name, presence: true

  def to_s
    "#{self.school.name} - #{self.name}"
  end
end
