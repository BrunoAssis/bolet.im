class Period < ActiveRecord::Base
  belongs_to :school
  belongs_to :school_year

  def to_s
    "#{self.school.name} - #{self.school_year.year} - #{self.name}"
  end
end
